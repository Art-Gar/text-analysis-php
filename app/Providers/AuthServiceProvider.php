<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Helpers\RBAC;
use App\Helpers\AuthHelper;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('Admin',function($user){
            if(AuthHelper::userHasPermissions($user->permissions,RBAC::Admin)) {
                return true;
            }
            return false;
        });
        Gate::define('Authed',function($user, RBAC $role){
                return AuthHelper::userHasPermissions($user->permissions,$role);
        });
        Gate::define('Editor',function($user){
            return $user->permissions > 1;
    });
        //
    }
}
