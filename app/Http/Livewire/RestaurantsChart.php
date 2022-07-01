<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Restaurant;
use \ArielMejiaDev\LarapexCharts\LarapexChart;


class RestaurantsChart extends Component
{
    public $restaurants;
    public $reviews;
    public $direction;
    protected $chart;
    protected $top_10_best_restaurants;
    protected $restaurants_name;
    protected $average_ratings;
    public $chart_id;

    public function render()
    {
        $linechart = $this->sort_by($this->direction);
        $this->chart_id = $linechart->id;
         return view('livewire.restaurants-chart', compact('linechart'));
    }

    /* public function getlinechart()
    {
        return $this->linechart;
    } */

    public function sort_by($direction){
        $this->direction = $direction;
        $this->chart = new LarapexChart();
        $linechart = $this->build($direction);
        return $linechart;
    }

    public function dataUpdated() {
        $this->emit('dataUpdated', ['linechart' => $this->linechart, 'direction' => $this->direction]);
    }

    public function mount(LarapexChart $chart)
    {
        $this->chart = $chart;
        $this->direction = 'DESC';
    }

    public function build($direction): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $top_10_best_restaurants = Restaurant::orderBy('rating', $direction)->take(10);

        $restaurants_name = $top_10_best_restaurants->pluck('name')->all();
        $average_ratings = $top_10_best_restaurants->pluck('rating')->all();

        $reviews = [];
        foreach($top_10_best_restaurants->get() as $restaurant){
            $reviews[] = $restaurant->reviews->count();
        }

        return $this->chart->linechart()
            ->setTitle('Top 10 des restaurants')
            ->setSubtitle('Classement des restaurants.')
            ->setHeight(270)
            ->addData('Note moyenne obtenue', $average_ratings)
            ->addData('Avis des clients', $reviews)
            ->setXAxis($restaurants_name);
    }


}
