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
                'feature_id' => 1,
            ),
            1 => 
            array (
                'package_id' => 2,
                'feature_id' => 1,
            ),
            2 => 
            array (
                'package_id' => 2,
                'feature_id' => 2,
            ),
        ));
        
        
    }
}