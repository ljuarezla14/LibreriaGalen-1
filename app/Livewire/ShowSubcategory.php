<?php

namespace App\Livewire;

use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowSubcategory extends Component
{
    use WithFileUploads;
    public $subcategories, $category;

    public function mount(){
        $this->getSubcategories();
    }
    public function getSubcategories(){
        $this->subcategories = Subcategory::all();
    }

    public function render()
    {
        return view('livewire.show-subcategory')->layout('layouts.app');
    }
}
