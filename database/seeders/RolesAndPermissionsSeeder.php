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
        $team1 = Role::create(['name' => 'team1', 'guard_name' => 'admin']);
        $team2 = Role::create(['name' => 'team2', 'guard_name' => 'admin']);

        $permissionOfCompany = Permission::create(['name' => 'company', 'guard_name' => 'admin']);
        Permission::create(['name' => 'user', 'guard_name' => 'admin']);
        Permission::create(['name' => 'money', 'guard_name' => 'admin']);
        Permission::create(['name' => 'mail_delivery', 'guard_name' => 'admin']);
        Permission::create(['name' => 'notification', 'guard_name' => 'admin']);
        Permission::create(['name' => 'facility', 'guard_name' => 'admin']);
        Permission::create(['name' => 'domain', 'guard_name' => 'admin']);
        $permissionOfSystem = Permission::create(['name' => 'system', 'guard_name' => 'admin']);
        $permissionOfMoney = Permission::create(['name' => 'money']);

        $team1->givePermissionTo($permissionOfSystem);
        $team1->givePermissionTo($permissionOfCompany);
        $team2->givePermissionTo($permissionOfSystem);
    }
}
