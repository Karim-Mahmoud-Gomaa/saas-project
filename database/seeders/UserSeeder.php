<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        $admin = User::create([
                        'name' => 'admin',
                        'email' => 'admin@example.com',
                        'password' => Hash::make('12345678'),
                        'is_admin' => true
                ]);

        // Assign super admin role
        $admin->assignRole('super admin');
    }
}
