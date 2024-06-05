<?php

namespace App\Livewire\Charts;

use App\Models\Categories;
use Livewire\Component;

class CategoriesChart extends Component
{
    public $labels;
    public function mount(){
        $this->labels=Categories::all('name')->pluck('name');
    }
    public function render()
    {
        return view('livewire.charts.categories-chart');
    }
}
