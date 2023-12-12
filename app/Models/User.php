<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Auth\MustVerifyEmail;
use App\Helpers\AuthHelper;
use App\Helpers\RBAC;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Query\Builder;
/**
* @mixin Builder
*/
class User extends Authenticatable implements MustVerifyEmailContract
{
    use HasApiTokens, HasFactory, Notifiable, MustVerifyEmail;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
//    public function role(): HasOne
//    {
//        return $this->hasOne(Role::class, 'id', 'role_id');
//    }
    public function getAll(): Collection
    {
        return User::select(['id','name','email','permissions'])->get();
    }
    public static function findById(int $id): ?User
    {
        $user = User::select(['id','name','email','permissions'])->where('id', $id)->first();
        return $user;
    } 
    public static function updateUserPermissions(int $id, int $permissions)
    {
        $user = User::findById($id);
        if (!(AuthHelper::userHasPermissions($permissions, RBAC::Admin) & AuthHelper::userHasPermissions($user->permissions, RBAC::Admin))) {
            error_log('admin');
        }
        User::where('id', $id)->update(['permissions' => $permissions]);
    }
    public static function getUsers(string $search = null) {
        $query = self::query();
        if($search && $search != '') {
            $query->whereRaw('LOWER(user.name) LIKE ?', '%'.$search.'%')->orWhereRaw('LOWER(user.email) LIKE ?', '%'.$search.'%');
        }
        return $query->get();
    }
}
