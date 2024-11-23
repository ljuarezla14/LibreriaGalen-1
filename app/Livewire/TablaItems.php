<?php

namespace App\Livewire;

use App\Models\Products;
use Livewire\Component;

class TablaItems extends Component
{
    protected $listeners = ['render'];

    public Products $product;

    public function render()
    {
        return view('livewire.tabla-items');
    }
}
