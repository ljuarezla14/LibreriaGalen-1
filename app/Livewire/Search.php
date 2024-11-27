<?php

namespace App\Livewire;

use App\Models\Products;
use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Search extends Component
{
    public $search;
    public $open = false;
    public $qty = 1;

    public function updatedSearch($value)
    {
        if ($value) {
            $this->open = true;
        } else {
            $this->open = false;
        }
    }

    public function addItem($productId)
    {
        $product = Products::find($productId);
        // && $this->id->subcategory->category->id == 4
        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $this->qty,
            'price' => $product->price,
            'weight' => 550
        ]);
        // $this->dispatch('table-cart', 'render');
        // $this->dispatch('tabla-items', 'render');
        $this->dispatch('render');
        $this->open = false;
        $this->search = '';
    }

    public function render()
    {
        if ($this->search) {
            $products = Products::where('name', 'LIKE', '%' . $this->search . '%')
                ->where('status', 2)
                ->take(4)
                ->get();
        } else {
            $products = [];
        }
        return view('livewire.search', compact('products'));
    }
}
