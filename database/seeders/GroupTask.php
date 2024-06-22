<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTask extends Seeder
{
    /**
     * Run the database seeds. php artisan make:seeder GroupTask
     */
    public function run(): void
    {
        DB::table('group_task')->insert([
            [
                'name' => 'grupo 1',
                'description' => 'Este es el primero',
            ],
            [
                'name' => 'grupo 2',
                'description' => 'Este es el segundo',
            ]
    
    ]);
    }
}
