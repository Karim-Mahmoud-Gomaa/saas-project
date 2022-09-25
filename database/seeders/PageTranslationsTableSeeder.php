<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PageTranslationsTableSeeder extends Seeder
{
    
    /**
    * Auto generated seed file
    *
    * @return void
    */
    public function run()
    {
        
        
        \DB::table('page_translations')->delete();
        
        \DB::table('page_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'page_id' => 3,
                'content' => '{"en":"We are Development Experts","ar":"\\u0627\\u062d\\u0635\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644 \\u0648\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629 \\u0644\\u0634\\u0631\\u0643\\u062a\\u0643"}',
            ),
            1 => 
            array (
                'id' => 2,
                'page_id' => 3,
                'content' => '{"en":"Seamlessly actualize client-based users after out-of-the-box value. Globally embrace strategic data through frictionless expertise.","ar":"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u0645 \\u0647\\u0648 \\u0628\\u0628\\u0633\\u0627\\u0637\\u0629 \\u0646\\u0635 \\u0634\\u0643\\u0644\\u064a \\u0628\\u0645\\u0639\\u0646\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u063a\\u0627\\u064a\\u0629 \\u0647\\u064a \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0648\\u0644\\u064a\\u0633 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0648\\u064a\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u0639 \\u0648\\u062f\\u0648\\u0631 \\u0627\\u0644\\u0646\\u0634\\u0631."}',
            ),
            2 => 
            array (
                'id' => 3,
                'page_id' => 2,
                'content' => '{"en":"Get Fully Control and Visibility your Company","ar":"\\u0627\\u062d\\u0635\\u0644 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u062a\\u062d\\u0643\\u0645 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644 \\u0648\\u0627\\u0644\\u0631\\u0624\\u064a\\u0629 \\u0644\\u0634\\u0631\\u0643\\u062a\\u0643"}',
            ),
            3 => 
            array (
                'id' => 4,
                'page_id' => 2,
                'content' => '{"en":"Proactively coordinate quality quality vectors vis-a-vis supply chains. Quickly engage client-centric web services.","ar":"\\u0644\\u0648\\u0631\\u064a\\u0645 \\u0625\\u064a\\u0628\\u0633\\u0648\\u0645 \\u0647\\u0648 \\u0628\\u0628\\u0633\\u0627\\u0637\\u0629 \\u0646\\u0635 \\u0634\\u0643\\u0644\\u064a \\u0628\\u0645\\u0639\\u0646\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u063a\\u0627\\u064a\\u0629 \\u0647\\u064a \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0648\\u0644\\u064a\\u0633 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0648\\u064a\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645 \\u0641\\u064a \\u0635\\u0646\\u0627\\u0639\\u0627\\u062a \\u0627\\u0644\\u0645\\u0637\\u0627\\u0628\\u0639 \\u0648\\u062f\\u0648\\u0631 \\u0627\\u0644\\u0646\\u0634\\u0631."}',
            ),
            4 => 
            array (
                'id' => 15,
                'page_id' => 3,
                'content' => '{"en":"Frequently Asked Questions"}',
            ),
            5 => 
            array (
                'id' => 16,
                'page_id' => 3,
                'content' => '{"en":"Completely whiteboard top-line channels and fully tested value. Competently generate testing procedures before visionary maintainable growth strategies for maintainable."}',
            ),
            6 => 
            array (
                'id' => 27,
                'page_id' => 6,
                'content' => '{"en":"Nice to Seeing You Again"}',
            ),
            7 => 
            array (
                'id' => 28,
                'page_id' => 6,
                'content' => '{"en":"Please log in to access your account web-enabled methods of innovative niches."}',
            ),
        ));
        
        
    }
}