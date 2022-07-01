<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\Review;
use App\Models\User;
use App\Charts\RestaurantsReviews;
use App\Charts\GeneralChart;

class Admincontroller extends Controller
{

    public function index(RestaurantsReviews $chart) {

        $restaurants = Restaurant::orderBy('rating', 'ASC')->get();
        $users = User::latest()->get();
        $reviews = Review::get();
        $piechart = $chart->build();

        return view('admin.dashboard', compact('restaurants', 'users', 'reviews', 'piechart'));
    }

    public function restaurants(){
        $restaurants = Restaurant::latest()->paginate(12);

        return view('admin.restaurants.index', compact('restaurants'));
    }

    public function users() {
        $users = User::latest()->paginate(12);

        return view('admin.users.index', compact('users'));
    }

    public function reviews() {
        $reviews = Review::latest()->paginate(12);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function delete_review(Review $review){
        $review->delete();

        return back();
    }

}
