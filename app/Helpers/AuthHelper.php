<?php

namespace App\Helpers;
use App\Helpers\RBAC;


class AuthHelper
{
    public static function UserHasPermissions($user, RBAC $role): bool {
        return $user->role->permissions & $role->value;
    }
}
