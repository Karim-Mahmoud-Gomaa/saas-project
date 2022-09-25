<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TermsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('terms')->delete();
        
        \DB::table('terms')->insert(array (
            0 => 
            array (
                'id' => 1,
                'months' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'months' => 6,
            ),
            2 => 
            array (
                'id' => 3,
                'months' => 3,
            ),
            3 => 
            array (
                'id' => 4,
                'months' => 12,
            ),
            4 => 
            array (
                'id' => 5,
                'months' => 18,
            ),
            5 => 
            array (
                'id' => 6,
                'months' => 25,
            ),
        ));
        
        
    }
}