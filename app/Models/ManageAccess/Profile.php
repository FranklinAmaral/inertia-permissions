<?php

namespace App\Models\ManageAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'access_profiles';

    protected $fillable = ['name', 'status'];

    protected $appends = ['status_name'];

    public function statusName()
    {
        switch ($this->status) {
            case 1:
                $status = 'Ativo';
                break;
            case 0:
                $status = 'Inativo';
                break;
            default:
                $status = 'Undefined';
                break;
        }
        return $status;

    }
    public function getStatusNameAttribute()
    {
        return $this->statusName();
    }
}
