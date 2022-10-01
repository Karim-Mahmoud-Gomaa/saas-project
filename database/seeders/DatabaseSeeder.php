<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // $this->call(PagePagesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PageTranslationsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(TermPackagesTableSeeder::class);
        $this->call(ServicesTableSeeder::class);
        $this->call(PackagesTableSeeder::class);
        $this->call(PackageFeaturesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(FaqTableSeeder::class);
    }
}
