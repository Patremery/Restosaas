<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;

class RestaurantController extends Controller
{
    public function show(Restaurant $restaurant) {
        return view('front.restaurants.single', compact('restaurant'));
    }
}
