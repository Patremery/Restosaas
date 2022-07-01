<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Restaurant;

class RestaurantsReviews
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {

        $five_stars = Restaurant::where('rating', '5')->count();
        $four_stars = Restaurant::where('rating', '4')->count();
        $three_stars = Restaurant::where('rating', '3')->count();
        $two_stars = Restaurant::where('rating', '2')->count();
        $one_star = Restaurant::where('rating', '1')->count();

        return $this->chart->pieChart()
            ->setTitle('Vue d\'ensemble des avis clients')
            ->setSubtitle('Moyennes obtenue par avis')
            ->addData([$one_star, $two_stars, $three_stars, $four_stars, $five_stars])
            ->setLabels(['Resto 1 étoile', 'Resto 2 étoiles', 'Resto 3 étoiles', 'Resto 4 étoiles', 'Resto 5 étoiles']);
    }
}
