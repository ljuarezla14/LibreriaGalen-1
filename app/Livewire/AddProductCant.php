<?php

namespace App\Livewire;

use App\Models\Products;
use CodersFree\Shoppingcart\Facades\Cart;
use Livewire\Component;

class AddProductCant extends Component
{
    public $rowId;
    public $qty = 1;
    public $cantidad = 0; // Esto será el stock disponible

    protected $listeners = ['render'];

    public function mount()
    {
        $item = Cart::get($this->rowId); // Obtener el artículo del carrito
        $product = Products::find($item->id); // Buscar el producto por ID
        $this->cantidad = $product->quantity; // Guardar la cantidad disponible en el producto
        $this->qty = $item->qty; // Establecer la cantidad actual del carrito
    }

    public function decrement()
    {
        if ($this->qty > 1) { // Evitar que la cantidad sea menor que 1
            $this->qty--;
            Cart::update($this->rowId, $this->qty); // Actualizar carrito
            $this->dispatch('render'); // Actualizar la vista
        }
    }

    public function increment()
    {
        if ($this->qty <= $this->cantidad) { // Verificar si hay suficiente stock
            $this->qty++;
            Cart::update($this->rowId, $this->qty); // Actualizar carrito
            $this->dispatch('render'); // Actualizar la vista
        }
    }

    public function render()
    {
        return view('livewire.add-product-cant'); // Renderizar la vista del componente
    }
}
