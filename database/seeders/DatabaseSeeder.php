<?php

namespace Database\Seeders;

use App\Models\RolePermission;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
    */
    public function run(): void
    {
        // User::factory(10)->create();

    //    $this->call(RolesTableSeeder::class);
        // $this->call(PermissionSeeder::class);
        // $this->call(RoleSeeder::class);
        // app(RolePermission::class)->admin();
<<<<<<<<< Temporary merge branch 1
        $this->call(UserRoleSeeder::class);
=========
        app(RolePermission::class)->super_admin();
>>>>>>>>> Temporary merge branch 2
    }
}