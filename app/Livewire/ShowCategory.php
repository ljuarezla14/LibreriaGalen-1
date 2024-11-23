<?php

namespace App\Livewire;

use App\Models\Brands;
use App\Models\Category;
use App\Models\Subcategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowCategory extends Component
{
    use WithFileUploads;
    public $categories, $category;

    public function mount(){
        $this->getCategories();
    }
    public function getCategories(){
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.show-category')->layout('layouts.app');
    }
}
