<?php

namespace App\Livewire;

use App\Models\Order;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateItems extends Component
{
    protected $listeners = ['render'];
    public $client, $dni, $phone;

    public $rules = [
        'client' =>'required',
        'phone' =>'required',
        'dni' => 'required',

    ];
    protected $validationAttributes =[
        'client' => 'nombre de cliente',
        'phone' => 'celular',
        'dni' => 'dni',
    ];

    public function create_order(){
        $rules = $this->rules;
        $this->validate($rules);

        $order = new Order();
        $order->client = $this->client;
        $order->phone = $this->phone;
        $order->dni = $this->dni;
        $order->user_id = Auth::user()->id;
        $order->total = Cart::subtotal();
        $order->content = Cart::content();
        $order->save();
        Cart::destroy();
        $this->dispatch('OrderCreate', 'show');
        return redirect()->route('orders.create', $order);
    }
    public function render()
    {
        return view('livewire.create-items');
    }
}
