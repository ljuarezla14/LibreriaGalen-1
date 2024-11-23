<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Products;
use Livewire\Component;

class CreateOrder extends Component
{
    public function render(Products $product, Order $order)
    {
        return view('livewire.create-order', compact('product'))->layout('layouts.app');
    }
}
