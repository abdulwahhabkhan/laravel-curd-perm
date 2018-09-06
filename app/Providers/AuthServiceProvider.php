<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        \App\Http\Models\Users\Role::class => \App\Policies\RolePolicy::class,
        \App\User::class => \App\Policies\UserPolicy::class,
        \App\Http\Models\Sales\Customer::class => \App\Policies\CustomerPolicy::class,
        \App\Http\Models\Sales\Sale::class => \App\Policies\SalePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
