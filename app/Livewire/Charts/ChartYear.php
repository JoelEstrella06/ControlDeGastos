<?php

namespace App\Livewire\Charts;

use App\Models\Gastos;
use Carbon\Carbon;
use Livewire\Component;

class ChartYear extends Component
{
    public $data=[];
    public function mount(){
        $yearStart = Carbon::now()->startOfYear();
        $yearEnd = Carbon::now()->endOfYear();
        $suma=[];
        while ($yearEnd->greaterThanOrEqualTo($yearStart)) {
            $dates=[Carbon::create($yearStart)->toDateString(),Carbon::create($yearStart)->endOfMonth()->toDateString()];
           array_push($this->data,Gastos::whereBetween('date',$dates)->sum('cantidad'));
           $yearStart->addMonth();
        }
    }
    public function render()
    {
        return view('livewire.charts.chart-year');
    }
}
