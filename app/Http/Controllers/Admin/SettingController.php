<?php

namespace App\Http\Controllers\Admin;

use anlutro\LaravelSettings\Facades\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Notifications\TestMail;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\HtmlString;

class SettingController extends Controller
{
    public function showSettingsForm()
    {
        $settings = Setting::all();
        return view('backend.settings.main', ['settings' => $settings]);
    }

    public function mailSettingsForm()
    {
        $settings = Setting::all();
        return view('backend.settings.mail', ['settings' => $settings]);
    }


    public function updateSettings(Request $request)
    {
        $request_data = $request->except('_token', 'sliders');

        if (!$request->redirect) {
            Setting::set('redirect', false);
            Setting::set('redirect_url', null);
        }


        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            request()->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request_data['logo'] = $this->upload($request->logo, "settings");
        }

        if ($request->hasFile('page_image') && $request->file('page_image')->isValid()) {
            request()->validate([
                'page_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request_data['page_image'] = $this->upload($request->page_image, "settings");
        }


        foreach ($request_data as $key => $field) {
            // if (!empty($request->$key)) {
                Setting::set($key, $field);
            // }
        }
        Setting::save();


        $this->changeEnvironmentVariable('MAIL_DRIVER', Setting::get('MAIL_MAILER'));
        $this->changeEnvironmentVariable('MAIL_HOST', Setting::get('MAIL_HOST'));
        $this->changeEnvironmentVariable('MAIL_PORT', Setting::get('MAIL_PORT'));
        $this->changeEnvironmentVariable('MAIL_USERNAME', Setting::get('MAIL_USERNAME'));
        $this->changeEnvironmentVariable('MAIL_PASSWORD', Setting::get('MAIL_PASSWORD'));
        $this->changeEnvironmentVariable('MAIL_ENCRYPTION', Setting::get('MAIL_ENCRYPTION'));
        $this->changeEnvironmentVariable('MAIL_FROM_ADDRESS', Setting::get('MAIL_FROM_ADDRESS'));
        $this->changeEnvironmentVariable('MAIL_FROM_NAME', Setting::get('MAIL_FROM_NAME'));


        return redirect()->back()->with('success', __('Settings has been saved successfully'));
    }

    function upload($file, $folder)
    {
        $profile_img = Image::make($file)->encode('png');
        $img = $file->hashName();
        Storage::disk('local')->put('public/images/' . $folder . '/' . $img, (string)$profile_img, 'public');
        return $img;
    }

    public function uploadEditor(Request $request)
    {
        if ($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . time() . '.' . $extension;

            //Upload File
            $request->file('upload')->storeAs('public/uploads', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/' . $filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }

    function changeEnvironmentVariable($key, $value)
    {
        $path = base_path('.env');

        if (is_bool(env($key))) {
            $old = env($key) ? 'true' : 'false';
        } elseif (env($key) === null) {
            $old = 'null';
        } else {
            $old = env($key);
        }

        if (file_exists($path)) {
            file_put_contents($path, str_replace(
                "$key=" . $old,
                "$key=" . $value,
                file_get_contents($path)
            ));
        }
    }


    // test mail
    public function testMail()
    {
        try {
            Notification::route('mail', Setting::get('MAIL_FROM_ADDRESS'))
                ->notify(new TestMail());
            return redirect()->back()->with('success', __('Test mail has been sent successfully'));
        } catch (\Exception $e) {
            $msg = '<b>Test mail has not been sent successfully, There is some problem in your mail settings</b> <br><br> The Error : <br>' . $e->getMessage();
            $msg = new HtmlString($msg);
            return redirect()->back()->with('error', $msg);
        }
    }
}
