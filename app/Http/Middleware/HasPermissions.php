<?php

namespace App\Http\Middleware;

use Closure;
use App\Traits\PermissionTrait;

class HasPermissions
{
    // page access and route access implemented by this trait

    use PermissionTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \App\Models\Users\Role  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->isAllowed($request)) {
            return response(view('errors.401'));
        }
        return $next($request);
    }
}
