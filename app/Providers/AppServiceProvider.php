<?php

namespace App\Providers;

use App\ProductCategory;
use App\Role;
use App\Setting;
use App\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(190);

	    if (! session('app.settings')) {
            session(['app.settings' => Setting::all()]);
	    }

	    \Blade::if('authorize', function ($permission, $type) {
		    return (auth()->check() ? hasPermission($permission, $type) : false);
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
