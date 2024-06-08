<?php

namespace App\Livewire\Charts;

use App\Models\Categories;
use App\Models\Gastos;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class CategoriesChart extends Component
{
    public $data;
    public function mount(){
        $labels=Categories::gastosMes()->get(['id','name']);
        $gastos=Gastos::mes()->get();
        $this->data=$this->genData($labels,$gastos);
    }
    //funcion que será llamada desde el front para actualizar los datos del chart
    #[On('setDate')]
    public function dataUpdate($date){
        $this->reset('data');
        $labels=Categories::gastosMes($date)->get(['id','name']);
        $gastos=Gastos::mes($date)->get();
        $this->data=$this->genData($labels,$gastos);
    }
    //función para generar el arreglo con los datos que utliza el chart
    public function genData(Collection $categories,Collection $gastos){
        $arreglo=[];
        $categories->map(function($categoria)use($gastos){
            foreach($gastos as $gasto){
                if($categoria->id==$gasto->categori_id){
                    $categoria->total+=$gasto->cantidad;
                }
            }
            return $categoria;
        });
        foreach($categories as $dato){
            array_push($arreglo,['value'=>$dato->total,'name'=>$dato->name]);
        }
        return $arreglo;
    }
    public function render()
    {
        return view('livewire.charts.categories-chart');
    }
}
