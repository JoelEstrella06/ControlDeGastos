<?php

namespace App\Livewire\Charts;

use App\Models\Categories;
use Carbon\Carbon;
use Livewire\Component;

class CategoriesChart extends Component
{
    public $labels;
    public function mount(){
        dd(Categories::gastosMes(Carbon::now()->toDateString())->pluck('name'));
        $this->labels=Categories::all('name')->pluck('name');
    }
    public function render()
    {
        return view('livewire.charts.categories-chart');
    }
}
