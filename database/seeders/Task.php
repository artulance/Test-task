<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Task extends Seeder
{
    /**
     * Run the database seeds. php artisan make:seeder Task
     */
    public function run(): void
    {
        DB::table('tasks')->insert([

            [
                'name' => 'Tarea 1',
                'description' => 'Primera tarea',
                'group_task_id' => 1,
                'user_id' => 1,
                'status' => 1,
                'iteration' => 2,
                'periodicity_id' => 2,
                'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'due_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::today()->format('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Tarea 2',
                'description' => 'Segunda tarea',
                'group_task_id' => 1,
                'user_id' => 1,
                'status' => 2,
                'iteration' => 2,
                'periodicity_id' => 2,
                'start_date' => Carbon::now()->format('Y-m-d H:i:s'),
                'due_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::today()->format('Y-m-d H:i:s'),
            ],    
            [
                'name' => 'Tarea 3',
                'description' => 'Tercera tarea',
                'group_task_id' => 1,
                'user_id' => 1,
                'status' => 3,
                'iteration' => 2,
                'periodicity_id' => 2,
                'start_date' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'due_date' => Carbon::tomorrow()->format('Y-m-d H:i:s'),
                'created_at' => Carbon::yesterday()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::today()->format('Y-m-d H:i:s'),
            ]  
        ]

        );  
    }
}
