<?php

namespace App\Livewire\Categories;

use App\Models\Categories;
use Exception;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditCategory extends Component
{
    public $id;
    #[Validate('required',message:'Ingrese el nuevo nombre')]
    public $name;
    public $color;
    public function mount(){
        $category=Categories::find($this->id);
        $this->name=$category->name;
        $this->color=$category->color;
    }
    public function categoryUpdate(){
        $this->validate();
        try{
            $category=Categories::find($this->id);
            $category->name=$this->name;
            $category->color=$this->color;
            $category->save();
            session()->flash('success', 'La información ha sido actualizada.');
            return redirect(request()->header('referer'));
        }catch(Exception $e){
            session()->flash('error', 'Ocurrió un error al actualizar la información.');
            return redirect(request()->header('referer'));
        }
    }
    public function render()
    {
        return view('livewire.categories.edit-category');
    }
}
