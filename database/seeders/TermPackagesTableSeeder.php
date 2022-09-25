<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TermPackagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('term_packages')->delete();
        
        \DB::table('term_packages')->insert(array (
            0 => 
            array (
                'term_id' => 1,
                'package_id' => 1,
                'discount' => '0.00',
            ),
            1 => 
            array (
                'term_id' => 1,
                'package_id' => 3,
                'discount' => '0.00',
            ),
            2 => 
            array (
                'term_id' => 1,
                'package_id' => 7,
                'discount' => '0.00',
            ),
            3 => 
            array (
                'term_id' => 2,
                'package_id' => 1,
                'discount' => '0.00',
            ),
            4 => 
            array (
                'term_id' => 2,
                'package_id' => 3,
                'discount' => '0.00',
            ),
            5 => 
            array (
                'term_id' => 3,
                'package_id' => 1,
                'discount' => '0.00',
            ),
            6 => 
            array (
                'term_id' => 3,
                'package_id' => 3,
                'discount' => '0.00',
            ),
            7 => 
            array (
                'term_id' => 3,
                'package_id' => 7,
                'discount' => '0.00',
            ),
            8 => 
            array (
                'term_id' => 4,
                'package_id' => 1,
                'discount' => '10.00',
            ),
            9 => 
            array (
                'term_id' => 4,
                'package_id' => 3,
                'discount' => '20.00',
            ),
            10 => 
            array (
                'term_id' => 4,
                'package_id' => 7,
                'discount' => '10.00',
            ),
            11 => 
            array (
                'term_id' => 5,
                'package_id' => 1,
                'discount' => '12.00',
            ),
            12 => 
            array (
                'term_id' => 5,
                'package_id' => 3,
                'discount' => '25.00',
            ),
            13 => 
            array (
                'term_id' => 6,
                'package_id' => 1,
                'discount' => '14.00',
            ),
            14 => 
            array (
                'term_id' => 6,
                'package_id' => 3,
                'discount' => '30.00',
            ),
            15 => 
            array (
                'term_id' => 6,
                'package_id' => 7,
                'discount' => '0.00',
            ),
        ));
        
        
    }
}