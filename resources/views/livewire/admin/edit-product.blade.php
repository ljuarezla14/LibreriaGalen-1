<div>

    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <h1 class="font-semibold text-xl font-gray-800 leading-tight">
                    Productos
                </h1>

                <x-danger-button wire:click="$dispatch('deleteProduct')">
                    Eliminar
                </x-danger-button>

            </div>
        </div>
    </header>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

        <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para editar un producto</h1>

        @livewire('admin.status-product', ['product' => $product], key('status-product-' . $product->id))

        <div class="bg-white shadow-xl rounded-lg p-6">
            <div class="grid grid-cols-2 gap-6 mb-4">

                {{-- Categoria --}}
                <div>
                    <x-label value="Categorías" class="text-lg" />
                    <select class="w-full form-control rounded-lg text-lg border-gray-300" wire:model.live="category_id">
                        <option value="" selected disabled>Selecciona una categoría</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="category_id" class="mt-2" />
                </div>

                {{-- Subcategoria --}}

                <div>
                    <x-label value="Subcategorías" class="text-lg" />
                    <select class="w-full form-control rounded-lg text-lg border-gray-300" wire:model.live="subcategory_id">
                        <option value="" selected disabled>Selecciona una subcategoría</option>
                        @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="subcategory_id" class="mt-2" />
                </div>

            </div>
        </div>

            {{-- Nombre --}}
            <div class="my-4">
                <x-label value="Nombre" />
                <x-input class="w-full" type="text" wire:model.live="name"
                    placeholder="Ingrese el nombre del producto" />
                <x-input-error for="product.name" />
            </div>

            {{-- Slug --}}
            <div class="mb-4">
                <x-label value="Slug" />
                <x-input class="w-full bg-gray-200" type="text" wire:model.live="slug"
                    placeholder="Ingrese el slug del producto" disabled />
                <x-input-error for="slug" />
            </div>

            {{-- descripcion --}}
            <div class="mb-4">

                <div wire:ignore>
                    <x-label value="Descripción" />

                    <textarea class="w-full form-control rounded-lg border-gray-300 shadow" rows="10"
                        wire:model="description" ></textarea>
                </div>
                <x-input-error for="description" />
            </div>


            <div class="grid grid-cols-2 gap-6 mb-4">
                {{-- Marca --}}
                <div>
                    <x-label value="Marca" />
                    <select class="w-full form-control border-gray-200 shadow rounded-lg" wire:model="brand_id">
                        <option value="" selected disabled>Seleccione una marca</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="brand_id" />
                </div>

                {{-- Precio --}}
                <div>
                    <x-label value="Precio" />
                    <x-input wire:model="price" type="number" class="w-full" step=".01" />
                    <x-input-error for="price" />
                </div>

            </div>

            {{-- Cantidad --}}
            <div>
                <x-label value="Cantidad" />
                <x-input wire:model="quantity" type="number" class="w-full" step=".01" />
                <x-input-error for="quantity" />
            </div>

            <div class="flex justify-end items-center mt-4">

                <x-action-message class="mr-3" on="saved">
                    Guardado Correctamente
                </x-action-message>

                <a >
                    <x-button wire:loading.attr="disable" wire:target="save" wire:click="save">
                        Editar Producto
                    </x-button>
                </a>
            </div>
        </div>


    </div>

    @push('script')
        <script>

            Livewire.on('deleteProduct', () => {
                Swal.fire({
                    title: '¿Estás Seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '¡Sí, borrar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.dispatch( 'delete');
                        Swal.fire(
                            '¡Eliminado!',
                            'El producto ha sido eliminado.',
                            'success'
                        )
                    }
                })
            })

        </script>
    @endpush


</div>
