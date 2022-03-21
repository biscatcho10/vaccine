<?php

namespace App\Http\Controllers\Admin;

use anlutro\LaravelSettings\Facade as Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function showSettingsForm()
    {
        $settings = Setting::all();
        return view('backend.settings.main', ['settings' => $settings]);
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
            $request_data['logo'] = upload($request->logo, "settings");
        }

        if ($request->hasFile('page_image') && $request->file('page_image')->isValid()) {
            request()->validate([
                'page_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request_data['page_image'] = upload($request->page_image, "settings");
        }


        foreach ($request_data as $key => $field) {
            if (!empty($request->$key)) {
                Setting::set($key, $field);
            }
        }
        Setting::save();


        return redirect()->back()->with('success', __('Settings has been saved successfully'));
    }

}
