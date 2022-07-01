<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserProfileTest extends TestCase
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

    public function test_logged_user_access_his_profile_page()
    {
        $user =  User::factory()->create();
        $this->actingAs($user);

        $this->get('/user/profile')
            ->assertStatus(200);
    }

    public function test_user_access_his_reviews()
    {
        $user =  User::factory()->create();
        $this->actingAs($user);

        $this->get('/user/reviews')
            ->assertStatus(200);
    }
}
