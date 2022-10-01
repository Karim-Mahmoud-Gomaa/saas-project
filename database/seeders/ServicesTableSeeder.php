<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('services')->delete();
        
        \DB::table('services')->insert(array (
            0 => 
            array (
                'id' => 1,
                'slug' => 'cart-monster',
                'name' => '{"en":"Cart Monster","ar":"Monster متجر"}',
                'keywords' => NULL,
                'description' => '{"en":"E-commerce Platform which supports all you need.","ar":"منصة التجارة الإلكترونية التي تدعم كل ما تحتاجه."}',
            ),
        ));
        
        
    }
}