<?php

namespace App\Livewire;

use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class TableCart extends Component
{
    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();
        $this->dispatch('render');
    }

    public function delete($rowID){
        Cart::remove($rowID);
        $this->dispatch('render');
    }

    public function render()
    {
        return view('livewire.table-cart');
    }
}
