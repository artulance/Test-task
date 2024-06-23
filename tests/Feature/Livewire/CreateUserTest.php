<?php

namespace Tests\Feature\Livewire;

use App\Filament\Resources\UsersResource;
use App\Filament\Resources\UsersResource\Pages\ListUsers;
// use App\Livewire\CreateUser;
use App\Filament\Resources\UsersResource\Pages\CreateUsers;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;
//php artisan make:livewire create-user --test
class CreateUserTest extends TestCase
{
    use RefreshDatabase; //Necesario para que funcione el @test
    // /** @test */
    // public function renders_successfully()
    // {
    //     Livewire::test(User::class)
    //         ->assertStatus(200);
    // }

    public function it_can_render_page()
    {
        $this->get(UsersResource::getUrl('index'))
            ->assertSuccessful();
    }

    /** @test */
    public function it_can_list_users()
    {
        $users = User::factory()->count(10)->create();

        Livewire::test(ListUsers::class)
            ->assertSee($users->pluck('email')->toArray());
    }

        /** @test */
    /** @test */
    public function it_cannot_render_create_page()
    {
        $this->get(UsersResource::getUrl('create'))
            ->assertRedirect();
    }

    /** @test */
    public function it_can_crate_user()
    {
        // Arrange
        $newUser = User::factory()->make();

        // Act
        Livewire::test(CreateUsers::class)
            // Setting the orm value
            ->set('data.name', $newUser->name)
            ->set('data.email', $newUser->email)
            ->set('data.password', $newUser->password)
            ->set('data.password_confirmation', $newUser->password)
            // Trying to hook the data store mechanism
            ->call('create')
            ->assertHasNoErrors();

        // Assert
        $this->assertDatabaseCount('users', 1);
        $this->assertDatabaseHas('users', [
            'name' => $newUser->name,
            'email' => $newUser->email,
            'password' => $newUser->password,
        ]);
    }

    


}
