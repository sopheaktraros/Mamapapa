<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	    $settings = [
		    'app_name' => "SAMBATH ECOMMERCE",
		    'logo' => url('logo-white.png'),
		    'logo_fixed' => url('logo-colored.png'),
		    'address' => 'Beoung Kork 2, Toul Kork, Phnom Penh',
		    'email' => 'info@sambathexpress.com | sambath@sambathexpress.com',
		    'phone' => '(855) 011 326 231 / 015 227 782',
		    'exchange_rate' => 6.5,
			'website' => 'www.cam-asean.com',
			'footer_description_en' => '',
			'footer_description_kh' => '',
			'facebook_link' => '',
			'instagram_link' => '',
			'twitter_link' => '',
			'china_domestic_shipping' => 0,
			'heading_fee' => 3,
			'price_cbm' => 0,
			'weight_price' => 0,
			'logo_footer' => ''
	    ];

	    foreach ($settings as $name => $value) {
		    DB::table('settings')->insert([
			    'setting_name' => $name,
			    'setting_value' => $value
		    ]);
	    }
    }
}
