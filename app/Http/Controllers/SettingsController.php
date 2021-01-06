<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	public function index() {

		$settings = Setting::get();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->setting_name] = $setting->setting_value;
        }

		return view('settings.index')->with('setting', $data);
	}

	public function update(Request $request) {
		$inputs = $request->all();

		if ($request->file('logo')) {
			@unlink(setting('logo'));
			$inputs['logo'] = uploadImage($request->file('logo'), 'images/Logo/');
		}

        if ($request->file('logo_footer')) {
            @unlink(setting('logo_footer'));
            $inputs['logo_footer'] = uploadImage($request->file('logo_footer'), 'images/Logo/');
        }

		unset($inputs['_token']);
		unset($inputs['_method']);

		foreach ($inputs as $input => $value) {
			$setting = Setting::firstOrCreate([
				'setting_name' => $input
			]);

			if ($setting) {
				$setting->setting_value = $value;
				$setting->save();
			}
		}

		// session()->forget('app.settings');
		
		session(['app.settings' => Setting::all()]);
		// session()->regenerate('app.settings');
		
		
		return redirect()->back()->with([
			'info' => 'Settings updated.'
		]);
	}

}
