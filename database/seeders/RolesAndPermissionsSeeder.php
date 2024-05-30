<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $editorRole = Role::create(['name' => 'editor', 'guard_name' => 'admin']);

        $permissionOfEditProfile = Permission::create(['name' => 'edit profile', 'guard_name' => 'admin']);
        $permissionOfDeleteProfile = Permission::create(['name' => 'delete profile', 'guard_name' => 'admin']);

        $adminRole->givePermissionTo($permissionOfEditProfile);
        $adminRole->givePermissionTo($permissionOfDeleteProfile);
        $editorRole->givePermissionTo($permissionOfEditProfile);
    }
}
