<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
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

    public function getPermissionsAttribute()
    {
        $permissions = DB::table('access_users_profiles')
            ->join('access_profiles_permissions', 'access_profiles_permissions.profile_id', 'access_users_profiles.profile_id')
            ->join('access_objects_permissions', 'access_objects_permissions.id', 'access_profiles_permissions.object_permission_id')
            ->join('access_objects', 'access_objects.id', 'access_objects_permissions.object_id')
            ->join('access_permissions', 'access_permissions.id', 'access_objects_permissions.permission_id')
            ->select(DB::raw('CONCAT(access_objects.slug,\'_\',access_permissions.slug) as permission'))
            ->where('access_users_profiles.user_id', $this->id)
            ->pluck('permission')->all();

        if($permissions[0]){
            foreach ($permissions as $permissiom) {
                $arrayPermissions[$permissiom] = true;
            }
        };
        // dd($arrayPermissions);
        return $arrayPermissions;

        // return [
        //     'posts_view' => in_array($this->id, [1,2]),
        //     'posts_manage' => $this->id == 2,
        // ];
    }
}
