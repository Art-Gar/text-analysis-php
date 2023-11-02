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
        Gate::define('admin',function($user){
            if($user->role->permissions == 0x7FFFFFFF) {
                return true;
            }
            return false;
        });
        Gate::define('Authed',function($user, RBAC $role){
            if(AuthHelper::UserHasPermissions($user,$role)) {
                return true;
            }
            return false;
        });
        //
    }
}
