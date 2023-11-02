<?php

namespace App\Helpers;
use App\Helpers\RBAC;


class AuthHelper
{
    public static function UserHasPermissions($user, RBAC $role) {
        if($user->role->permissions & $role) {
            return true;
        }
        return false;
    }
}
