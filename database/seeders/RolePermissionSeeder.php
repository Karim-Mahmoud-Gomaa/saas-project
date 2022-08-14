<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        DB::table('permissions')->truncate();

        // Create User Management Permissions
        Permission::create(['name' => 'index users']);
        Permission::create(['name' => 'show users']);
        Permission::create(['name' => 'store users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'destroy users']);

        // Create Roles & Permissions Management
        Permission::create(['name' => 'index roles']);
        Permission::create(['name' => 'show roles']);
        Permission::create(['name' => 'store roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'destroy roles']);


        // Create super admin role
        $role = Role::create(['name'=>'super admin']);

    }
}
