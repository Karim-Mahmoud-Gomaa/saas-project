<?php

namespace Modules\Clients\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class ClientsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // Create Client Management Permissions
        Permission::create(['name' => 'index clients']);
        Permission::create(['name' => 'trashed clients']);
        Permission::create(['name' => 'show clients']);
        Permission::create(['name' => 'store clients']);
        Permission::create(['name' => 'update clients']);
        Permission::create(['name' => 'destroy clients']);
        Permission::create(['name' => 'force delete clients']);
        Permission::create(['name' => 'restore deleted clients']);
    }
}
