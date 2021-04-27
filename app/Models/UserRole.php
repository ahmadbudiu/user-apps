<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany(UserPermission::class, 'role_has_permissions', 'role_id', 'permission_id');
    }
}
