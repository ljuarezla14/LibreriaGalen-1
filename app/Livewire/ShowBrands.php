<?php

namespace App\Livewire;

use App\Models\Brands;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowBrands extends Component
{
    use WithFileUploads;
    public $brands;
    public function mount(){
        $this->getBrands();
    }
    public function getBrands(){
        $this->brands = Brands::all();
    }
    public function render()
    {
        return view('livewire.show-brands')->layout('layouts.app');
    }
}
