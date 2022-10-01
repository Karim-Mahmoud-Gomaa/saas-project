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
                'service_id' => 1,
                'description' => '{"en":"Affiliate System","ar":"نظام الانتساب"}',
            ),
            1 => 
            array (
                'id' => 2,
                'service_id' => 1,
                'description' => '{"en":"Product Points System","ar":"نظام نقاط المنتج"}',
            ),
            array (
                'id' => 3,
                'service_id' => 1,
                'description' => '{"en":"Delivery System","ar":"نظام توصيل"}',
            ),
            array (
                'id' => 4,
                'service_id' => 1,
                'description' => '{"en":"Wholesale products System","ar":"نظام منتجات بالجملة"}',
            ),
            array (
                'id' => 5,
                'service_id' => 1,
                'description' => '{"en":"Auction System","ar":"نظام منتجات بالمزاد"}',
            ),
            array (
                'id' => 6,
                'service_id' => 1,
                'description' => '{"en":"POS System","ar":"نظام نقاط البيع"}',
            ),
            array (
                'id' => 7,
                'service_id' => 1,
                'description' => '{"en":"Sellers Packages System","ar":"نظام حزم البائعين"}',
            ),
            array (
                'id' => 8,
                'service_id' => 1,
                'description' => '{"en":"E-Wallet Clients System","ar":"نظام عملاء المحفظة الإلكترونية"}',
            ),
            array (
                'id' => 9,
                'service_id' => 1,
                'description' => '{"en":"Unlimited Products","ar":"منتجات غير محدودة"}',
            ),
            array (
                'id' => 10,
                'service_id' => 1,
                'description' => '{"en":"Unlimited Customers","ar":"عملاء غير محدودين"}',
            ),
            array (
                'id' => 11,
                'service_id' => 1,
                'description' => '{"en":"50 Products","ar":"50 منتج"}',
            ),
            array (
                'id' => 12,
                'service_id' => 1,
                'description' => '{"en":"3 Customers","ar":"3 عملاء"}',
            ),
            
            
        ));
        
        
    }
}