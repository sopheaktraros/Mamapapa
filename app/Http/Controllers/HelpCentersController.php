<?php

namespace App\Http\Controllers;

use App\HelpCenter;
use Illuminate\Http\Request;

class HelpCentersController extends Controller
{
	public function index() {
		$helpCenters = HelpCenter::get();
        $data = [];
        foreach ($helpCenters as $helpCenter) {
            $data[$helpCenter->help_center_name] = $helpCenter->help_center_value;
        }

		return view('help-centers.index')->with('helpCenter', $data);
	}

	public function update(Request $request) {
		$inputs = $request->all();
		unset($inputs['_token']);
		unset($inputs['_method']);

		foreach ($inputs as $input => $value) {
			$helpCenter = HelpCenter::firstOrCreate([
				'help_center_name' => $input
			]);

			if ($helpCenter) {
				$helpCenter->help_center_value = $value;
				$helpCenter->save();
			}
		}

		 session(['app.help_centers' => HelpCenter::all()]);

		return redirect()->back()->with([
			'info' => 'Help Cebter updated.'
		]);
	}

}
