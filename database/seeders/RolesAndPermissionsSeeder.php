<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'user_manage',
            'student_manage',
            'teacher_manage',
            'classroom_manage',
            'subject_manage',
            'attendance_manage',
            'grade_manage',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $superAdmin = Role::create(['name' => 'superadmin']);
        $superAdmin->givePermissionTo(Permission::all());

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo([
            'student_manage',
            'teacher_manage',
            'classroom_manage',
            'subject_manage',
        ]);

        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'student']);
    }
}