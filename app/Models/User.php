<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method paginate(int $int)
 * @method create(array $array)
 * @method find($id)
 */
class User extends Authenticatable
{
    use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

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
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
    public function roletest()
    {
        return $this->hasMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

//    public function checkPermissionAccess($PermissionCheck)
//    {
//        $roles = auth()->user()->roles;
//        foreach ($roles as $role) {
//            $permissions = $role->permissions;
//            if ($permissions->contains('key_code', $PermissionCheck)) {
//                return true;
//            }
//        }
//        return false;
//
//    }
}
