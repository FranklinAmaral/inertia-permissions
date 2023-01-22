<?php

namespace App\Models\ManageAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'access_users_profiles';

    protected $fillable = ['user_id', 'profile_id', 'status'];
}
