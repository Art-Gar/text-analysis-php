<?php

namespace App\Helpers;
use App\Helpers\RBAC;


class AuthHelper
{
    public static function userHasPermissions($permissions, RBAC $role): bool {
        return $permissions & $role->value;
    }
}
