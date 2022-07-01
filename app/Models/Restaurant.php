<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Restaurant extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get all of the reviews for the Restaurant
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Get Restaurant average rating
     */
    public function average_rating(){
        $rating = round($this->reviews->avg('rating'));
        return $rating;
    }

    /**
     * Display the rating in view
     */
    public function display_rating(){
        for($i = 0; $i < 5; $i++){
            echo '<li class="mb-0">
            <i class="fa fa-star'.( $this->average_rating() <= $i ? '-o' : '').'"></i>
            </li>';
        }
    }
}
