<?php

namespace Tests\Feature;

use App\Filament\Resources\TaskResource;
use App\Filament\Resources\TaskResource\Pages\ListTasks;
use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
//php artisan make:test CreateTask
class CreateTask extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    
    /** @test */
    public function it_can_render_page()
    {
        $this->get(TaskResource::getUrl('index'))
            ->assertSuccessful();
    }

        /** @test */
    public function it_can_list_task()
    {
        $task = Task::factory()->count(10)->create();

        Livewire::test(ListTasks::class)
            ->assertSee($task->pluck('id')->toArray());
    }

       /** @test */
       public function it_cannot_render_create_page()
       {
           $this->get(TaskResource::getUrl('create'))
               ->assertRedirect();
       }
   
       /** @test */
       public function it_can_crate_task()
       {
           // Arrange
           $newGroup = Task::factory()->make();
   
           // Act
           Livewire::test(CreateTask::class)
               // Setting the orm value
               ->set('data.name', $newGroup->name)
               ->set('data.description', $newGroup->description)
               ->set('data.group_task_id', $newGroup->group_task_id)
               ->set('data.user_id', $newGroup->user_id)
               ->set('data.iteration', $newGroup->iteration)
               ->set('data.periodicity_id', $newGroup->periodicity_id)
               ->set('data.status', $newGroup->status)
               ->set('data.start_date', $newGroup->start_date)
               ->set('data.due_date', $newGroup->due_date)
               // Trying to hook the data store mechanism
               ->call('create')
               ->assertHasNoErrors();
   
           // Assert
           $this->assertDatabaseCount('users', 1);
           $this->assertDatabaseHas('users', [
               'name' => $newGroup->name,
               'description' => $newGroup->description,
               'group_task_id' => $newGroup->group_task_id,
               'user_id' => $newGroup->user_id,
               'iteration' => $newGroup->iteration,
               'periodicity_id' => $newGroup->periodicity_id,
               'status' => $newGroup->status,
               'start_date' => $newGroup->start_date,
               'due_date' => $newGroup->due_date,
           ]);
       }
}
