<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProduct extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $products = Products::where('name', 'like', '%' . $this->search . '%')->paginate(10);

        return view('livewire.show-product',  compact('products'))->layout('layouts.app');
    }
}
