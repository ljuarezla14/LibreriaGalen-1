<div class="container pb-4">
    @livewire('table-cart')
    
    @livewire('create-items', ['product' => $product], key($product->id))
</div>
