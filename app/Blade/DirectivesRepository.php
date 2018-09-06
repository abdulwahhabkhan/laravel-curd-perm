<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 20/03/2018
 * Time: 23:04
 */

namespace App\Blade;

use Illuminate\Support\Facades\Blade;

class DirectivesRepository
{
    /**
     * Register the directives.
     *
     * @param  array $directives
     * @return void
     */
    public static function register(array $directives)
    {
        collect($directives)->each(function ($item, $key) {
            Blade::directive($key, $item);
        });
    }
}