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

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            request()->validate([
                'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request_data['logo'] = upload($request->logo, "settings");
        }

        if ($request->hasFile('favicon') && $request->file('favicon')->isValid()) {
            request()->validate([
                'favicon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request_data['favicon'] = upload($request->favicon, "settings");
        }

        foreach ($request_data as $key => $field) {
            if (!empty($request->$key)) {
                Setting::set($key, $field);
            }
        }
        Setting::save();
        return redirect(route('settings'))->with('success', __('Settings has been saved successfully'));
    }

}
