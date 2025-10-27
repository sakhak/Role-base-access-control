<?php

// database/seeders/RolesTableSeeder.php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $roles = [
            ['name' => 'super_admin', 'description' => 'Full system administrator'],
            ['name' => 'admin', 'description' => 'School administrator'],
            ['name' => 'teacher', 'description' => 'Teaching staff'],
            ['name' => 'student', 'description' => 'Student user'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}