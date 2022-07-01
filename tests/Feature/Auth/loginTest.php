<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;
use App\Models\User;

class loginTest extends TestCase
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

    /**
     * A user can access a login form.
     *
     * @return void
    */
    public function test_user_access_a_login_form() : void
    {
        $response = $this->withoutExceptionHandling()->get('/login');

        $response->assertStatus(200);

        $response->assertViewIs('auth.login');
    }

    /**
     * Login form is hidden to authenticated users.
     *
     * @return void
    */
    public function test_login_form_is_hidden_to_authenticated_users()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/login');

        $response->assertRedirect('/home');
    }

    /**
     * A user can login with correct credentials.
     *
     * @return void
    */
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'my-password'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');

        $this->assertAuthenticatedAs($user);
    }
}
