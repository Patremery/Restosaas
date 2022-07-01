<?php

namespace App\Http\Livewire;

use App\Models\Restaurant;
use App\Models\Review;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RestaurantRating extends Component
{
    public $review;
    public $comment;
    public $currentId;
    public $restaurant;
    public $hideForm;
    public $rating;
    public $successmessage;
    public $reviews;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
    ];

    public function render()
    {
        $reviews = $this->restaurant->reviews;

        return view('livewire.restaurant-rating', compact('reviews'));
    }

    public function mount()
    {
        if(auth()->user()){
            $review = Review::where('user_id', Auth::id())->where('restaurant_id', $this->restaurant->id)->first();
            if (!empty($review)) {
                $this->rating  = $review->rating;
                $this->comment = $review->comment;
                $this->currentId = $review->id;
            }
        }

        return view('livewire.restaurant-rating');
    }

    public function rate()
    {
        // GEt any existing review for this restaurant related to this user
        $review = Review::where('user_id', Auth::id())->where('restaurant_id', $this->restaurant->id)->first();

        $this->validate();

        if (!empty($review)) {
            //Update existing review here
            $review->user_id =  Auth::id();
            $review->restaurant_id = $this->restaurant->id;
            $review->rating = $this->rating;
            $review->comment = $this->comment;
            $review->status = 0;
            try {
                $review->update();

                //Update restaurant
                $this->update_average_rating();

                session()->flash('message', 'Votre avis a été modifié avec succès.');
            } catch (\Throwable $th) {
                throw $th;
            }
        } else {
            //create new rating here
            $review = new Review();
            $review->user_id =  Auth::id();
            $review->restaurant_id = $this->restaurant->id;
            $review->rating = $this->rating;
            $review->comment = $this->comment;
            $review->status = 0;

            try {
                $review->save();

                //updating restaurant average rating 
                $this->update_average_rating();

                session()->flash('message', 'Votre avis a été publié avec succès.');
            } catch (\Throwable $th) {
                throw $th;
            }

            $this->hideForm = true;
        }
    }

    public function update_average_rating(){
        $this->restaurant->rating = $this->restaurant->average_rating();
        $this->restaurant->save();
    }

    public function delete($id)
    {
        $review = Review::find($id);
        if ($review && ($review->user_id == Auth::id())) {
            $review->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }
}
