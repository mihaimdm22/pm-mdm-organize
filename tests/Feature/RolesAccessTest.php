<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class RolesAccessTest extends TestCase
{
    /** @test */
    public function user_must_login_to_access_to_admin_dashboard()
    {
        $this->get(route('admin.home'))
            ->assertRedirect('login');
    }

    /** @test */
    public function admin_can_access_to_admin_dashboard()
    {
        //Having
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        //When
        $response = $this->get(route('admin.home'));

        //Then
        $response->assertOk();
    }

    /** @test */
    public function users_cannot_access_to_admin_dashboard()
    {
        //Having
        $user = User::factory()->create();

        $user->assignRole('user');

        $this->actingAs($user);

        //When
        $response = $this->get(route('admin.home'));

        //Then
        $response->assertForbidden();
    }

    /** @test */
    public function user_can_access_to_home()
    {
        //Having
        $user = User::factory()->create();

        $user->assignRole('user');

        $this->actingAs($user);

        //When
        $response = $this->get(route('user.tasks.index'));

        //Then
        $response->assertOk();
    }

    /** @test */
    public function admin_can_access_to_home()
    {
        //Having
        $adminUser = User::factory()->create();

        $adminUser->assignRole('admin');

        $this->actingAs($adminUser);

        //When
        $response = $this->get(route('home'));

        //Then
        $response->assertOk();
    }
}
