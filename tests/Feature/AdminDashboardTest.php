<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        $this->initDatabase();
    }

    public function tearDown(): void
    {
        $this->resetDatabase();
        parent::tearDown();
    }

    public function test_admin_access_admin_dashboard()
    {
        $user =  User::factory()->create(['type' => 0]);
        $this->actingAs($user);

        $this->get('/admin/dashboard')
            ->assertStatus(200);
    }

    public function test_user_cannot_access_admin_dashboard()
    {
        $user =  User::factory()->create(['type' => 1]);
        $this->actingAs($user);

        $this->get('/admin/dashboard')
            ->assertStatus(404);
    }

    public function test_admin_access_all_reviews()
    {
        $user =  User::factory()->create(['type' => 0]);
        $this->actingAs($user);

        $this->get('/admin/reviews')
            ->assertStatus(200);
    }

    public function test_admin_access_all_restaurants()
    {
        $user =  User::factory()->create(['type' => 0]);
        $this->actingAs($user);

        $this->get('/admin/restaurants')
            ->assertStatus(200);
    }

    public function test_admin_access_all_users()
    {
        $user =  User::factory()->create(['type' => 0]);
        $this->actingAs($user);

        $this->get('/admin/users')
            ->assertStatus(200);
    }
}
