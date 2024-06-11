<?php

namespace App\Livewire\Gastos;

use App\Models\Gastos;
use Livewire\Component;

class DetailGasto extends Component
{
    public $id,$data;
    public function mount(){
        $this->data=Gastos::find($this->id);
    }
    public function render()
    {
        return view('livewire.gastos.detail-gasto');
    }
}
