<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function profile(){
        $user = Auth::user();
        return view('front.users.profile', compact('user'));
    }

    public function reviews(){
        $reviews = Review::where('user_id', Auth::id())->paginate(12);

        return view('front.users.reviews', compact('reviews'));
    }
}
