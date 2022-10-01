<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    
    /**
    * Auto generated seed file
    *
    * @return void
    */
    public function run()
    {
        
        
        \DB::table('pages')->delete();
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Home Page',
                'title' => '{"en":"Home","ar":"الرئيسية"}',
                'keywords' => '{"en":"keywords in English","ar":"KEYWORDS (AR)"}',
                'description' => '{"en":"description in English","ar":"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a"}',
            ),
            1 => 
            array (
                'id' => 3,
                'name' => 'Service Page',
                'title' => '{"en":"Services","ar":"خدمات"}',
                'keywords' => '{"en":"keywords in English","ar":"KEYWORDS (AR)"}',
                'description' => '{"en":"description in English","ar":"الوصف بالعربية"}',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'About Us',
                'title' => '{"en":"About Us","ar":"من نحن"}',
                'keywords' => '{"en":"keywords in English","ar":"KEYWORDS (AR)"}',
                'description' => '{"en":"description in English","ar":"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a"}',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'Login Page',
                'title' => '{"en":"Login","ar":"تسجيل دخول"}',
                'keywords' => '{"en":"keywords in English","ar":"KEYWORDS (AR)"}',
                'description' => '{"en":"description in English","ar":"\\u0634\\u0631\\u062d \\u0628\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a"}',
            ),
        ));
        
        
    }
}