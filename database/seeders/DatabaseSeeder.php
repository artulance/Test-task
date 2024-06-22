<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Primera ejecución php artisan migrate --seed
     * Al usar sql pregunta si queremos crear la base de datos indicamos que si.
     * Realizará la migración y los seeds
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            GroupTask::class,
            Status::class,
            Periodicity::class,
            Task::class,
        ]);
    }
}
