<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('features')->delete();
        
        \DB::table('features')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_id' => 6,
                'description' => '{"en":"Item One","ar":"\\u0645\\u064a\\u0632\\u0629 \\u0631\\u0642\\u0645 1"}',
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 6,
                'description' => '{"en":"Item Two"}',
            ),
        ));
        
        
    }
}