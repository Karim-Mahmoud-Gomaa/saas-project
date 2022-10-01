<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PackageFeaturesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('package_features')->delete();
        
        \DB::table('package_features')->insert(array (
            0 => 
            array (
                'package_id' => 1,
                'feature_id' => 11,
            ),
            1 => 
            array (
                'package_id' => 1,
                'feature_id' => 12,
            ),
            2 => 
            array (
                'package_id' => 2,
                'feature_id' => 1,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 2,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 3,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 4,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 5,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 6,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 7,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 8,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 9,
            ),
            array (
                'package_id' => 2,
                'feature_id' => 10,
            ),
        ));
        
        
    }
}