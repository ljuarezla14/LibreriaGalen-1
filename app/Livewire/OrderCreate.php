<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Products;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Container\Attributes\Auth;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class OrderCreate extends Component
{
    use AuthorizesRequests;
    public $client, $dni, $phone, $status, $order;
    // protected $listeners = ['render'];

    public function delete($rowID, Order $order){
        $items = json_decode($order->content);
        foreach ($items as $item) {
            Cart::add([
                'id' => $item->id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'weight' => 550
            ]);
            if($item->rowId == $rowID){
                Cart::remove($rowID);
                $order->content = Cart::content();
                $order->total = Cart::subtotal();
                $order->status = 1;
                $order->save();
                Cart::destroy();
            }


        }
    }

    public function show(Order $order){
        $items = json_decode($order->content);
        foreach ($items as $item) {
            Cart::add([
                'id' => $item->id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'weight' => 550
            ]);
        }
        $this->client = $order->client;
        $this->dni = $order->dni;
        $this->phone = $order->phone;
        $this->status = $order->status;
        if(Cart::content()){
            $order->content = Cart::content();
            $order->total = Cart::subtotal();
            $order->save();
            Cart::destroy();
        }
        $items = json_decode($order->content);
        return view('livewire.order-create', compact('order', 'items'));
    }

    public function render()
    {
        $items = json_decode($this->order->content);

        return view('livewire.order-create', compact('items'));
    }
}
