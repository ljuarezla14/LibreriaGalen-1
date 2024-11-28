<?php

namespace App\Livewire;

use App\Models\Order;
use App\Models\Products;
use CodersFree\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateItems extends Component
{
    protected $listeners = ['render'];
    public $client, $dni, $phone;



    public $rules = [
        'client' => 'required',
        'phone' => 'required',
        'dni' => 'required',

    ];
    protected $validationAttributes = [
        'client' => 'nombre de cliente',
        'phone' => 'celular',
        'dni' => 'dni',
    ];

    
    public function create_order()
    {
        // Validar los datos de la orden
        $rules = $this->rules;
        $this->validate($rules);
        $order = new Order();

        // Actualizar el stock de los productos en el carrito
        foreach (Cart::content() as $cartItem) {
            $product = Products::find($cartItem->id); // Buscar el producto por ID

            if ($product) {
                // Verificar si el producto tiene suficiente stock
                if ($product->quantity >= $cartItem->qty) {
                    // Descontar la cantidad del stock
                    $product->quantity = $product->quantity - $cartItem->qty;
                    $product->save(); // Guardar la actualización en la base de datos
                    if($product->quantity == 0){
                        $product->status = 1;
                        $product->save();
                    }
                    // Crear la orden
                    $order->client = $this->client;
                    $order->phone = $this->phone;
                    $order->dni = $this->dni;
                    $order->user_id = Auth::user()->id;
                    $order->total = Cart::subtotal();
                    $order->content = Cart::content();
                    $order->save();
                }

            }
        }
         // Vaciar el carrito después de completar el pedido
         Cart::destroy();

         // Disparar eventos para actualizar la UI
         $this->dispatch('OrderCreate', 'show');

         // Redirigir a la página de creación de la orden con los datos de la nueva orden
         return redirect()->route('orders.create', $order);
    }

    public function render()
    {
        return view('livewire.create-items');
    }
}
