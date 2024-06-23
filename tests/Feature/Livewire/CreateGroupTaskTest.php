<?php

namespace Tests\Feature\Livewire;

use App\Livewire\CreateGroupTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
//php artisan make:livewire create-group-task --test 
//Esto crea también los componentes de livewire, no es necesario
class CreateGroupTaskTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function renders_successfully()
    {
        Livewire::test(CreateGroupTask::class)
            ->assertStatus(200);
    }
    
}
