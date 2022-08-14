<?php

namespace Modules\PageBuilder\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('pb_settings')->truncate();
        DB::table('pb_settings')->insert([
            [
                'key'=>'theme',
                'value'=>'DefaultTheme'
            ],
            [
                'key'=>'header',
                'value'=>'Header'
            ],
            [
                'key'=>'footer',
                'value'=>'Footer'
            ],
        ]);

        // $this->call("OthersTableSeeder");
    }
}
