<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create roles
         //Role::create(['name' => 'instructor']);
         //Role::create(['name' => 'student']);
 
         // Create permissions if needed (optional)
         // Permission::create(['name' => 'view dashboard']);
 
         // Assign roles to users (example)
         // $user = User::find(1);
         // $user->assignRole('instructor');
    }
}
