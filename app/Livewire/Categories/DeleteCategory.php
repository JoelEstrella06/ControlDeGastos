<?php

namespace App\Livewire\Categories;

use App\Models\Categories;
use Exception;
use Livewire\Component;

class DeleteCategory extends Component
{
    public $id;
    public function deleteCategory(){
        try{
            $category = Categories::find($this->id);
            //eliminamos los registros que tenga la categoría
            $category->gastos()->delete();
            $category->delete();
            session()->flash('success','Categoría eliminada.');
            return redirect(request()->header('referer'));
        }catch(Exception $e){
            session()->flash('error','ERROR!! No es posible eliminar la categoría.');
            return redirect(request()->header('referer'));
        }
    }
    public function render()
    {
        return view('livewire.categories.delete-category');
    }
}
