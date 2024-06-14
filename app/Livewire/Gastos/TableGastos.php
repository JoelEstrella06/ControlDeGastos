<?php

namespace App\Livewire\Gastos;

use App\Models\Categories;
use App\Models\Gastos;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class TableGastos extends Component
{
    use WithPagination;
       
    public $category,$categories;
    #[Computed()]
    public function data(){
        if($this->category!=null){
            return Gastos::where('categori_id',$this->category)->orderBy('date','DESC')->paginate(15);
        }else{
            return Gastos::orderBy('date','DESC')->paginate(15);
        }
    }
    public function mount(){
        $this->categories=Categories::orderBy('name','ASC')->get(['id','name']);
    }
    public function updatedCategory($val){
        $this->resetPage();
        unset($this->data);
    }
    public function render()
    {
        return view('livewire.gastos.table-gastos');
    }
}
