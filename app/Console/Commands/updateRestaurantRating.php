<?php

namespace App\Console\Commands;

use App\Models\Restaurant;
use Illuminate\Console\Command;

class updateRestaurantRating extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:rating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make sure all restaurants commands are updated hourly';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        foreach(Restaurant::get() as $restaurant){
            $restaurant->rating = $restaurant->average_rating();
            $restaurant->save();
        }

        $this->info('Successfully updated restaurants rating.');
    }
}
