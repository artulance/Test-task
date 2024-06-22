<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Status extends Seeder
{
    /**
     * Run the database seeds. php artisan make:seeder Status
     * php artisan migrate:fresh --seed para crear tablas y seeds si hay algún error
     */
    public function run(): void
    {
        DB::table('status')->insert([
            [
                'name' => 'Abierta',
                'color' => 'info',
            ],
            [
                'name' => 'Pendiente',
                'color' => 'warning',
            ],
            [
                'name' => 'Cerrada',
                'color' => 'success',
            ]    
        ]);  
    }
}
