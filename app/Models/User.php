<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private const USER_ROLE = "user-role";
    private const ADMIN_ROLE = "admin-role";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = ['id', 'role_id'];

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

    public static function getUserRole() {

        return self::USER_ROLE;
    }

    public static function getAdminRole() {

        return self::ADMIN_ROLE;
    }

    public function role() {

        return $this->belongsTo(Role::class);
    }

    public function visas() {

        return $this->hasMany(Visa::class);
    }

    public function assignRole($role) {

        if(!$role) $role = Role::createRole(self::USER_ROLE);

        $this->role_id = $role->id;
        $this->save();
    }

    public function hasRole($role) {

        $role = Role::where('name', $role)->first();
        return $this->role_id == $role->id;
    }
}
