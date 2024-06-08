<?php

namespace App\Livewire\Charts;

use Carbon\Carbon;
use Livewire\Component;

class FilterInputDate extends Component
{
    public $date;
    public function mount(){
        $this->date = Carbon::now()->format('Y-m');
    }
    public function updatedDate($val){
        $this->dispatch('setDate', date:$val);
    }
    public function render()
    {
        return view('livewire.charts.filter-input-date');
    }
}
