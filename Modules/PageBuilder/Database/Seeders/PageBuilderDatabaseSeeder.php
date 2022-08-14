<?php

namespace Modules\PageBuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PageBuilderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // Create default home
        // Page::create([
        //     'name' => 'Default',
        //     'status' => PB_PAGE_STATUS_PUBLISHED
        // ]);

        // Create default 404

        $this->call([
            SettingTableSeeder::class,
        ]);
    }
}
