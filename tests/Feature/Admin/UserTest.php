<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserTest extends TestCase
{
    /** @test */
    public function it_can_show_the_index_user_page()
    {
        //Having
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        //When
        $response = $this->get(route('users.index'));

        //Then
        $response->assertStatus(200)
            ->assertSee('Manage Users')
            ->assertSee($adminUser->first_name)
            ->assertSee($adminUser->last_name)
            ->assertSee($adminUser->username)
            ->assertSee('Reset sort')
            ->assertSee('Filter')
            ->assertSee('Showing');
    }

    /** @test */
    public function it_can_show_the_create_user_page()
    {
        //Having
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        //When
        $response = $this->get(route('users.create'));

        //Then
        $response->assertStatus(200)
            ->assertSee('Create User')
            ->assertSee('Personal Information')
            ->assertSee('First name')
            ->assertSee('Password')
            ->assertSee('Avatar');
    }
}
