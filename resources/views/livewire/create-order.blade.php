<div class=" bg-repeat bg-scroll ">
        <div class="container">
            <div class="rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                <p class="text-gray-600 text-2xl uppercase text-center">
                    <span class="font-semibold">Crear Pedido </span></p>
            </div>


            <div class="bg-blue-200 rounded-lg shadow-lg px-6 py-4 mt-6 md:mx-24 mb-12">
                <div class="flex-1">
                    @livewire('Search')
                </div>
            </div>
            @livewire('tabla-items', ['product' => $product], key($product->id))
        </div>
</div>
