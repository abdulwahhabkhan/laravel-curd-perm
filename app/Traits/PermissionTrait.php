<?php
/**
 * Created by PhpStorm.
 * User: Abdul
 * Date: 16/03/2018
 * Time: 17:43
 */

namespace App\Traits;

use Auth;
use App\Role;

trait PermissionTrait
{
    protected function isAllowed($request)
    {
        $permissions = json_decode($request->user()->role->permission, true);
        $routename = $request->route()->getName();
        list($name, $action) = explode(".", $routename);

        return empty($permissions[$name]);
    }

    protected function policyCheck($ability)
    {
        $user = Auth::user();
        $permissions = json_decode($user->role->permission, true);
        list($name, $action) = explode(".", $ability);
        return !empty($permissions[$name][$ability]);
    }
}
