<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('packages')->delete();
        
        \DB::table('packages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_id' => 6,
                'is_active' => 1,
                'price' => '2512.00',
                'repo_path' => NULL,
                'name' => '{"en":"Silver","ar":"\\u0641\\u0636\\u064a"}',
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 6,
                'is_active' => 0,
                'price' => '2050.00',
                'repo_path' => NULL,
                'name' => '{"en":"Gold","ar":"\\u0630\\u0647\\u0628\\u064a"}',
            ),
            2 => 
            array (
                'id' => 3,
                'service_id' => 6,
                'is_active' => 1,
                'price' => '1200.00',
                'repo_path' => NULL,
                'name' => '{"en":"bronze"}',
            ),
            3 => 
            array (
                'id' => 7,
                'service_id' => 6,
                'is_active' => 1,
                'price' => '0.00',
                'repo_path' => 'Free-Package-path',
                'name' => '{"en":"Free Package"}',
            ),
            4 => 
            array (
                'id' => 8,
                'service_id' => 6,
                'is_active' => 0,
                'price' => '50.00',
                'repo_path' => 'dddd',
                'name' => '{"en":"xxx"}',
            ),
        ));
        
        
    }
}