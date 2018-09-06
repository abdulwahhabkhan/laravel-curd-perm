<?php

namespace App\Providers;

use App\Blade\DirectivesRepository;
use Illuminate\Support\ServiceProvider;

class BladeDirectivesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerDirectives();
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

    /**
     * Register all directives.
     *
     * @return void
     */
    public function registerDirectives()
    {
        foreach (glob(app_path().'/Blade/Directive-*.php') as $filename){
            $directives = require_once($filename);
            DirectivesRepository::register($directives);
        }
    }
}
