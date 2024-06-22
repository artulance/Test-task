<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Periodicity extends Seeder
{
    /**
     * Run the database seeds. php artisan make:seeder Periodicity
     */
    public function run(): void
    {
        DB::table('periodicity')->insert([
            [
                'name' => 'Todos los días',
            ],
            [
                'name' => 'Lunes',
            ],
            [
                'name' => 'Lunes, miercoles y viernes',
            ],    
            [
                'name' => '5 cada mes',
            ],    
            [
                'name' => ' 5 de marzo año',
            ],    
        ]);  
    }
}
