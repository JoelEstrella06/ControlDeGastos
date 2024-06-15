<?php

namespace App\Livewire\Docs;

use App\Exports\GastosExport;
use Carbon\Carbon;
use Exception;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

use function Laravel\Prompts\error;

class DowloadGastosDoc extends Component
{
    #[Validate('required',message:'Ingrese la fecha de inicio.')]
    public $start;
    #[Validate('required',message:'Ingrese la fecha de término.')]
    public $end;

    public function mount(){
        $this->start=Carbon::now()->startOfMonth()->format('Y-m-d');
        $this->end=Carbon::now()->endOfMonth()->format('Y-m-d');
    }
    public function genDoc(){
        $this->validate();
        //validamos que la fecha inicial no sea mayor a la de término
        if(!Carbon::create($this->start)->lessThanOrEqualTo(Carbon::create($this->end))){
            throw ValidationException::withMessages(['date'=>'La fecha de inicio debe ser menor o igual a la fecha de término']);
        }
        try{
            $rango=[$this->start,$this->end];
            return Excel::download(new GastosExport($rango),'Reporte de gastos.xlsx');
        }catch(Exception $e){
            dd($e);
        }
    }
    public function render()
    {
        return view('livewire.docs.dowload-gastos-doc');
    }
}
