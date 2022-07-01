<?php

namespace Tests\Feature;

use App\Http\Livewire\RestaurantRating;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use Livewire;

class ReviewsTest extends TestCase
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
     * A user can access homepage with all restaurants.
     *
     * @return void
    */
    public function test_guest_user_access_homepage() : void
    {
        $response = $this->withoutExceptionHandling()->get('/home');

        $response->assertStatus(200);

        $response->assertViewIs('front.home');
    }

     /**
     * A user can access a restaurant detail page.
     *
     * @return void
    */
    public function test_guest_user_access_a_restaurant_detail_page() : void
    {
        $restaurant  = Restaurant::factory()->create();
        $response = $this->get('/restaurant/'.$restaurant->id);

        $response->assertStatus(200);

        $response->assertViewIs('front.restaurants.single');
    }

    function test_guest_user_cannot_rate_a_restaurant() :void
    {
        $restaurant  = Restaurant::factory()->create();
        $this->get('/restaurant/'.$restaurant->id)->assertDontSeeLivewire('restaurant-rating');
    }

    public function test_authenticated_user_can_view_rating_form() : void
    {
        $restaurant  = Restaurant::factory()->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/restaurant/'.$restaurant->id)->assertSeeLivewire('restaurant-rating');
    }

}
