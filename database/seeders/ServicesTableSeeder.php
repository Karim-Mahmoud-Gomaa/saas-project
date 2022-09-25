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
                'id' => 6,
                'slug' => 'service-one',
                'name' => '{"en":"Service One"}',
                'keywords' => NULL,
                'description' => '{"en":"Synergistically pursue accurate initiatives without economically sound imperatives.\\n\\nProfessionally architect unique process improvements via optimal."}',
            ),
        ));
        
        
    }
}