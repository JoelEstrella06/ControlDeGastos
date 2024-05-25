<?php

namespace App\Livewire;

use App\Models\Categories;
use Livewire\Attributes\Validate;
use Livewire\Component;

class NewGasto extends Component
{
    public $categories;
    #[Validate('required')]
    public $category;

    #[Validate('required|gt:3')]
    public $monto=1;

    public function mount(){
        $this->categories = Categories::all(['id','name']);
    }
    public function newRegistro(){
        $this->validate();
    }
    public function render()
    {
        return view('livewire.new-gasto');
    }
}
