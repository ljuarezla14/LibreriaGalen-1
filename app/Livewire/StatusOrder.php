<?php

namespace App\Livewire;

use Livewire\Component;

class StatusOrder extends Component
{
    public $order, $status;

    public function mount(){
        $this->status = $this->order->status;
    }

    public function save(){
        $this->order->status = $this->status;
        $this->order->save();
        $this->dispatch('saved');

    }

    public function render()
    {
        return view('livewire.status-order');
    }
}
