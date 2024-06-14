<?php

namespace App\Livewire\Categories;

use App\Models\Categories;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewCategory extends Component
{
    #[Validate('required',message:'Ingrese un nombre para la categoría.')]
    public $name;
    public $color="#312E81";

    public function newCategory(){
        $this->validate();
        try{
            $reg=new Categories();
            $reg->name=$this->name;
            $reg->color=$this->color;
            $reg->save();
            session()->flash('success','Nueva categoría registrada.');
            return redirect(request()->header('referer'));
        }catch(Exception $e){
            session()->flash('success','Ocurrió un error al registrar la categoría.');
            return redirect(request()->header('referer'));
        }
    }
    public function render()
    {
        return view('livewire.categories.new-category');
    }
}
