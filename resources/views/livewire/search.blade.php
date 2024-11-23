<div class="flex-1 relative" style="z-index: 700" x-data>

    <x-input wire:model.live="search" type="text" class="w-full "
        placeholder="Busque algún producto..." />
    <button class="absolute top-0 right-0 w-12 h-full bg-[#1d617a] flex items-center justify-center rounded-r-md">
        <x-search size="35" color="white" />
    </button>

    <div class="absolute w-full hidden" :class="{ 'hidden': !$wire.open }" @click.away="$wire.open = false">
        <div class="bg-white rounded-lg shadow mt-1">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <section class="bg-white flex text-left py-2 w-full items-center">
                        <div class="ml-4 text-gray-600 ">
                            <p class="text-md font-semibold mb-1 leading-5">{{ $product->name }}</p>
                            <p class="text-sm">Categoria: {{ $product->subcategory->category->name }}</p>
                            <p class="text-sm">Marca: {{ $product->brand->name }}</p>
                            <p class="text-sm">Precio: {{ $product->price }}</p>
                        </div>
                        <button wire:click="addItem({{$product->id}})" wire:loading.attr="disabled"
                            class="p-1 ml-auto flex bg-blue-600 rounded-2xl">
                            <a class="text-white">Agregar</a>
                        </button>
                    </section>
                    <hr>
                @empty
                    <p class="text-md text-center py-2 font-semibold leading-5">No existe el plato o bebida ingresado.
                    </p>
                @endforelse

            </div>

        </div>
    </div>

</div>
