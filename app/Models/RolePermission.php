<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $fillable = [
        'role_id',
        'permission_id'
    ];

    const super_admin_permission = [
        'user.view',
        'user.create',
        'user.update',
        'user.manage-role',
        'user.change-status',

        'prfile.view',
        'profile.create',
        'profile.update',
        'profile.change-visibility',
        'profile.lock',
        'profile.delete'
    ];
    const admin_permission = [
        'user.view',
        'user.create',
        'user.update',
        'user.manage-role',
        'user.change-status',

        'prfile.view',
        'profile.create',
        'profile.update',
        'profile.change-visibility',
        'profile.lock',
    ];

    public function admin()
    {
        $admin = Role::where('key','admin')->first();
        $permssions = Permission::whereIn('key', self::admin_permission)->get();
        foreach ($permssions as $permssion){
            RolePermission::create([
                'role_id'       => $admin->id,
                'permission_id' => $permssion->id
            ]);
        }
    }
    public function super_admin(){
        $seper_admin = Role::where('key', 'super_admin')->first();
        $permissions = Permission::whereIn('key', self::super_admin_permission)->get();
        foreach($permissions as $permission){
            RolePermission::create([
                'role_id' => $seper_admin->id,
                'permission_id'=> $permission->id,
            ]);
        }
    }
}
