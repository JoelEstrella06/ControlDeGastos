<?php

namespace App\Livewire\Gastos;

use App\Models\Gastos;
use Exception;
use Livewire\Component;

class DeleteGasto extends Component
{
    public $id;

    public function deleteGasto(){
        try{
            $gasto=Gastos::find($this->id);
            $gasto->delete();
            session()->flash('success','Registro eliminado.');
            return redirect(request()->header('referer'));
        }catch(Exception $e){
            session()->flash('error','Surgió un error al eliminar el registro.');
            return redirect(request()->header('referer'));
        }
    }
    public function render()
    {
        return view('livewire.gastos.delete-gasto');
    }
}
