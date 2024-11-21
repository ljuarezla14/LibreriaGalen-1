<?php

namespace App\Livewire\Admin;

use App\Models\Products;
use Livewire\Component;
use Livewire\WithPagination;

class ShowProducts extends Component
{
    use WithPagination;
    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $products = Products::where('name', 'like', '%' . $this->search . '%')->paginate(10);


        return view('livewire.admin.show-products', compact('products'))->layout('layouts.admin');

    }
}
