<?php

namespace App\Livewire\Charts;

use App\Models\Categories;
use App\Models\Gastos;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoriesCantityChart extends Component
{
    public $data=[],$labels;

    public function mount(){
        $categorias=Categories::gastosMes()->get(['id','name']);
        $gastos=Gastos::mes()->get();
        $this->labels=$categorias->pluck('name');
        $this->genData($categorias,$gastos);
        
    }
    #[On('setDate')]
    public function dataUpdate($date){
        $categorias=Categories::gastosMes($date)->get(['id','name']);
        $gastos=Gastos::mes($date)->get();
        $this->labels=$categorias->pluck('name');
        $this->genData($categorias,$gastos);
    }
    //generamos el array con los datos
    public function genData(Collection $categorias, Collection $gastos){
        $this->reset('data');
        $categorias->map(function($categoria)use($gastos){
            foreach ($gastos as $gasto) {
                if($categoria->id==$gasto->categori_id){
                    $categoria->gasto+=$gasto->cantidad;
                }
            }
            return $categoria;
        });
        $this->data=$categorias->pluck('gasto');
    }
    public function render()
    {
        return view('livewire.charts.categories-cantity-chart');
    }
}
