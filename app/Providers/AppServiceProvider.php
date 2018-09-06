<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
	    Schema::defaultStringLength(191);

	    view()->composer('elements.sidebars.left', function($view){
            $menu = loadMenu();
	        $view->with(['user'=>Auth::user(), 'menu'=>$menu]);
        });
        /*DB::listen(function ($query) {
            Log::debug($query->sql);
            Log::debug($query->bindings);
            Log::debug($query->time );
        });*/
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
