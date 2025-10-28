<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable =[
        'name',
        'key',
        'description'
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions','role_id', 'permission_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_roles',  'user_id', 'role_id');
    }

    const roles = [
        [
            'name' => 'Super Admin',
            'key'  => 'super_admin',
        ],
        [
            'name' => 'Admin',
            'key'  => 'admin',
         ],
        [
            'name' => 'Teacher',
            'key'  => 'teacher',
        ],
        [
            'name' => 'Student',
            'key'  => 'student',
        ]
    ];
}
