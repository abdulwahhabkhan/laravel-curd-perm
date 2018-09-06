<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeDirectivesProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        foreach (glob(app_path().'/Directives/*.php') as $filename){
            require_once($filename);
        }
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
