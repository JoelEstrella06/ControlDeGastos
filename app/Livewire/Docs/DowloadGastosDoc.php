<?php

namespace App\Livewire\Docs;

use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Component;

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
        throw ValidationException::withMessages(['date'=>'La fecha de inicio debe ser menor o igual a la fecha de término']);
    }
    public function render()
    {
        return view('livewire.docs.dowload-gastos-doc');
    }
}
