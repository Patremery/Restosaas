<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Restaurant;

class GeneralChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $top_10_best_restaurants = Restaurant::orderBy('rating', 'DESC')->take(10);
        $restaurants_name = $top_10_best_restaurants->pluck('name')->all();
        $average_ratings = $top_10_best_restaurants->pluck('rating')->all();
        $reviews = [];

        foreach($top_10_best_restaurants->get() as $restaurant){
            $reviews[] = $restaurant->reviews->count();
        }

        return $this->chart->lineChart()
            ->setTitle('Top 10 des meilleurs restaurants')
            ->setSubtitle('Classement des meilleurs restaurants.')
            ->setHeight(270)
            ->addData('Note moyenne obtenue', $average_ratings)
            ->addData('Avis des clients', $reviews)
            ->setXAxis($restaurants_name);
    }
}
