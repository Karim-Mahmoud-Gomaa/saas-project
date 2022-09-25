<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaqTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('faq')->delete();
        
        \DB::table('faq')->insert(array (
            0 => 
            array (
                'id' => 1,
                'service_id' => 6,
                'question' => '{"en":"What happens if I go over my limit","ar":"\\u0627\\u0644\\u0633\\u0624\\u0627\\u0644 \\u0627\\u0644\\u0623\\u0648\\u0644"}',
                'answer' => '{"en":"Credibly facilitate leveraged process improvements for equity invested infrastructures. Continually mesh top-line human capital with backward-compatible outsourcing. Rapidiously coordinate intuitive deliverables rather than parallel metrics. Interactively monetize customer directed convergence and parallel sources. Enthusiastically architect client-centric e-services whereas granular e-commerce","ar":"\\u0627\\u0644\\u0625\\u062c\\u0627\\u0628\\u0629 \\u0631\\u0642\\u0645 1"}',
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 6,
                'question' => '{"en":"How do I calculate how much processing I need"}',
                'answer' => '{"en":"Distinctively enable premier potentialities through market positioning models. Distinctively extend unique infomediaries without enterprise-wide ideas. Objectively deploy multifunctional catalysts for change for installed base content. Seamlessly create go forward convergence through quality schemas. Objectively deploy cross-media leadership skills through customer directed sources"}',
            ),
            2 => 
            array (
                'id' => 3,
                'service_id' => 6,
                'question' => '{"en":"How do I processing I need"}',
                'answer' => '{"en":"Phosfluorescently deliver cooperative testing procedures after integrated communities. Dramatically simplify resource-leveling models with unique outsourcing. Professionally simplify covalent partnerships whereas market positioning best practices. Collaboratively utilize magnetic technology for robust technology"}',
            ),
        ));
        
        
    }
}