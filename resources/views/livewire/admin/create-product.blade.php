<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12 text-gray-700">

    <h1 class="text-3xl text-center font-semibold mb-8">Complete esta información para crear un producto</h1>

    <div class="grid grid-cols-2 gap-6 mb-4">

        {{-- Categoria --}}
        <div>
            <x-label class="mb-2 text-md" value="Categorias" />
            <select class="w-full form-control border-gray-200 shadow rounded-lg" wire:model.live="category_id" >
                <option value="" selected disabled >Seleccione una categoría</option>

                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach

            </select>
            <x-input-error for="category_id"/>
        </div>


        {{-- Subcategoria --}}

        <div>
            <x-label class="mb-2 text-md" value="Subcategorias" />
            <select class="w-full form-control border-gray-200 shadow rounded-lg" wire:model.live="subcategory_id" >
                <option value="" selected disabled >Seleccione una subcategoría</option>

                @foreach ($subcategories as $subcategory)
                    <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                @endforeach

            </select>
            <x-input-error for="subcategory_id" />
        </div>

    </div>

    {{-- Nombre --}}
    <div class="mb-4">
        <x-label value="Nombre"/>
        <x-input class="w-full"
                    type="text"
                    wire:model.live="name"
                    placeholder="Ingrese el nombre del producto"/>
                    <x-input-error for="name" />
    </div>

    {{-- Slug --}}
    <div class="mb-4">
        <x-label value="Slug"/>
        <x-input class="w-full bg-gray-200"
                    type="text"
                    wire:model.live="slug"
                    placeholder="Ingrese el slug del producto" disabled/>
                    <x-input-error for="slug" />
    </div>
    

    {{-- descripcion --}}
    <div class="mb-4">

       <div  wire:ignore>
            <x-label value="Descripción"/>

            <textarea class="w-full form-control rounded-lg border-gray-300 shadow" rows="10"
                wire:model="description"
                ></textarea>
       </div>
       <x-input-error for="description" />
    </div>


    <div class="grid grid-cols-2 gap-6 mb-4">
        {{-- Marca --}}
        <div>
            <x-label value="Marca"/>
            <select class="w-full form-control border-gray-200 shadow rounded-lg" wire:model="brand_id">
                <option value="" selected disabled>Seleccione una marca</option>
                    @foreach ($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                    @endforeach
            </select>
            <x-input-error for="brand_id" />
        </div>

        {{-- Precio --}}
        <div>
            <x-label value="Precio" />
            <x-input wire:model="price" type="number" class="w-full" step=".01"/>
            <x-input-error for="price" />
        </div>

        {{-- Cantidad --}}
    </div>

    <div>
        <x-label value="Cantidad" />
        <x-input wire:model="quantity" type="number" class="w-full" step=".01"/>
        <x-input-error for="quantity" />
    </div>

    <div class="flex mt-4">
        <x-button class="ml-auto" wire:loading.attr="disable" wire:click="save">
            Crear Producto
        </x-button>
    </div>

    <div>

    </div>

</div>
