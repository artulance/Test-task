<?php

namespace Tests\Feature;

use App\Filament\Resources\GroupTaskResource;
use App\Filament\Resources\GroupTaskResource\Pages\ListGroupTasks;
use App\Models\GroupTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
//php artisan make:test CreateGroupTask
class CreateGroupTask extends TestCase
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
        $this->get(GroupTaskResource::getUrl('index'))
            ->assertSuccessful();
    }

        /** @test */
    public function it_can_list_group()
    {
        $group = GroupTask::factory()->count(10)->create();

        Livewire::test(ListGroupTasks::class)
            ->assertSee($group->pluck('id')->toArray());
    }

       /** @test */
       public function it_cannot_render_create_page()
       {
           $this->get(GroupTaskResource::getUrl('create'))
               ->assertRedirect();
       }
   
       /** @test */
       public function it_can_crate_group()
       {
           // Arrange
           $newGroup = GroupTask::factory()->make();
   
           // Act
           Livewire::test(CreateGroupTask::class)
               // Setting the orm value
               ->set('data.name', $newGroup->name)
               ->set('data.description', $newGroup->description)
               // Trying to hook the data store mechanism
               ->call('create')
               ->assertHasNoErrors();
   
           // Assert
           $this->assertDatabaseCount('users', 1);
           $this->assertDatabaseHas('users', [
               'name' => $newGroup->name,
               'description' => $newGroup->description,
           ]);
       }
}
