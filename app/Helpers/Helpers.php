<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 05/03/2018
 * Time: 19:21
 */

use Illuminate\Contracts\View\Factory as ViewFactory;

function pr($data=array(), $die=false){

    echo "<pre>";
        print_r($data);
    echo "</pre>";

    if($die)
        die("Inside PRE");

}

function getValue($key, $data=array())
{
    return !empty($data[$key]) ? $data[$key] : false;
}

function view1($view = null, $data = [], $mergeData = [])
{
    $factory = app(ViewFactory::class);

    if (func_num_args() === 0) {
        return $factory;
    }
    if(request()->ajax()){
        $view = $factory->make($view, $data, $mergeData);
        $view = $view->renderSections();
        return json_encode($view);
    }
    return $factory->make($view, $data, $mergeData);
}