<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

//php artisan make:seeder UserSeeder
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Arturo',
            'email' => 'uncorreo@gmail.com',
            'email_verified_at' => '2024-08-21 12:33:20',
            'password' =>  Hash::make(env('PASSWORD_SEED')),
        ]);
    }
}
