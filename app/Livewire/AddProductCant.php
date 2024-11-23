<?php

namespace App\Livewire;

use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddProductCant extends Component
{
    public $rowId, $quantity;

    public $qty = 1;

    protected $listeners = ['render'];

    public function mount()
    {
       $item = Cart::get($this->rowId);
       $this->qty = $item->qty;
    }


    public function decrement(){
        $this->qty = $this->qty - 1;

        Cart::update($this->rowId, $this->qty);
        $this->dispatch('render');
    }

    public function increment(){
        $this->qty = $this->qty + 1;

        Cart::update($this->rowId, $this->qty);
        $this->dispatch('render');
    }


    public function render()
    {
        return view('livewire.add-product-cant');
    }
}
