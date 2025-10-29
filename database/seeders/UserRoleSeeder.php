<?php

// database/seeders/RolesTableSeeder.php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    public function run()
    {
        $user = \App\Models\User::where('email', 'sakhak@gmail.com')->first();
        $role = \App\Models\Role::where('key', 'teacher')->first();

        \App\Models\UserRole::create([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);

    }
}