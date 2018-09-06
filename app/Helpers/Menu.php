<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 05/03/2018
 * Time: 18:24
 */

use Illuminate\Support\Facades\Cache;
//use route;

function loadMenu(){
    $menu = config('menu');
    $permissions = json_decode(Auth::user()->role->permission, 1);

    $menu = Cache::remember('user_role'.Auth::user()->role->id, 60, function () use ($menu, $permissions) {
        return $menu = permissionFilter($menu, $permissions);;
    });

    return $menu;
}

/**
 * @param array $menu
 * @param array $permissions
 *
 * @return array
 */

function permissionFilter($menu = [], $permissions = [])
{
    $a = [];
    foreach ($permissions as $v){
        $a = array_merge($a, $v);
    }
    $ret = [];

    foreach ($menu as $m=>$sub){
        if($m != 'dashboard'  && $b = applyPermission($sub, $a)){
            $ret[$m] = $b;
        } else if($m == 'dashboard')
            $ret[$m] = $sub;
    }
    return $ret;
}

function applyPermission($menu, $permission)
{
    $r = [];
    if(!empty($menu['sub'])){
        foreach ($menu['sub'] as $k=>$v){

            if(!empty($v['sub'])){

            } else{
                if(in_array($v['url'], $permission))
                    $r['sub'][] = $v;
            }

        }

        if($r){
            unset($menu['sub']);
            $r = array_merge($menu, $r);
        }

    } else {
        if(in_array($menu['url'], $permission)){
            $r = $menu;
        }
    }

    return $r;
}

function getMenu($data = array())
{

    $output = '<ul class="nav">';
    $output .= '<li class="nav-header">Navigation</li>';
    foreach ($data as $row){

        $has_sub = !empty($row['sub']);
        $output .= '<li class="'.($has_sub ? 'has-sub': '') .'">';
        $output .= menuitem($row, $has_sub);
        $output .= $has_sub ? submenu($row['sub']) : '';
        $output .= '</li>';
    }
    $output .= '<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>';
    $output .= '</ul>';

    return $output;
}

function submenu($data = array())
{
    $output ='<ul class="sub-menu">';
    foreach ($data as $row){
        $has_sub = !empty($row['sub']);
        $output .= '<li>';
        $output .= menuitem($row, $has_sub);
        $output .= $has_sub ? submenu($row['sub']) : '';
        $output .= '</li>';
    }
    $output .='</ul>';

    return $output;

}

function menuitem($data = array(), $sub = false)
{
    $icon = !empty($data['icon']) ? $data['icon'] : '';
    $caret =  $sub ? '<b class="caret pull-right"></b>' : '';
    $href = !in_array($data['url'], array('javascript:;', '#')) ? route($data['url']) : $data['url'];
    return '<a href="'.$href.'">'.$caret.'<i class="'.$icon.'"></i>'.($sub ? '<span>'.$data['label'].'</span>': $data['label']).'</a>';
}

function routeslist($menu = false){
    $routeCollection = app()->routes->getRoutes();
    $routes = [];
    foreach ($routeCollection as $route){
        $isMenu = $route->getAction('menu');
        $module = $route->getAction('module');
        $isProtected = $route->getAction('protected');
        $name1 = $name = $route->getName();
        $submodule = explode(".", $name1)[0];
        if($isMenu){
            $routes[$module][$submodule][$name] = $name;
            if($isProtected){
                $name = str_replace('.list', '.create',  $name1);
                $routes[$module][$submodule][$name] = $name;
                $name = str_replace('.list', '.edit',  $name1);
                $routes[$module][$submodule][$name] = $name;
                $name = str_replace('.list', '.destroy',  $name1);
                $routes[$module][$submodule][$name] = $name;
            }
        }
    }

    return $routes;
}

