<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Setting;

class SettingsController extends Controller
{
    public function index()
    {
        return view('settings.index');
    }

    public function store(Request $request)
    {
        $settings = [
          'phone',
          'admin_email',
          'main_description',
          'footer_description',
        ];
        $newSettingsData = $request->all($settings);


        foreach ($newSettingsData as $key => $value){
            Setting::set($key, $value);
        }

        Setting::save();

        return back();
    }
}
