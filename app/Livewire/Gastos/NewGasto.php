<?php

namespace App\Livewire\Gastos;

use App\Models\Categories;
use App\Models\Gastos;
use Carbon\Carbon;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewGasto extends Component
{
    public $categories;
    #[Validate('required',message:'Seleccione una categoría')]
    public $category;

    #[Validate('required',message:'El monto invertido es requerido')]
    #[Validate('gt:0',message:'El monto debe ser mayor a cero')]
    public $monto=0;

    #[Validate('required', message:'Ingrese una fecha')]
    public $fecha;

    public $description="";
    //iniciamos variables cuando se monta el componente de Livewire
    public function mount(){
        $this->fecha=Carbon::now()->format('Y-m-d');
        $this->categories = Categories::all(['id','name']);
    }
    public function newRegistro(){
        $this->validate();
        try{
            $gasto=new Gastos();
            $gasto->categori_id=$this->category;
            $gasto->cantidad=$this->monto;
            $gasto->description=$this->description;
            $gasto->date=$this->fecha;
            $gasto->save();
            session()->flash('success','registro guardado con éxito.');
            return redirect(request()->header('Referer'));
        }
        catch(Exception $error){
            session('error','Ha ocurrido un error al guardar el registro.');
            return redirect(request()->header('Referer'));
        }

    }
    public function render()
    {
        return view('livewire.gastos.new-gasto');
    }
}
