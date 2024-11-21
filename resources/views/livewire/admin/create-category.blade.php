<div>
    <x-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva categoria
        </x-slot>
        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva categoria
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Nombre
                </x-label>

                <x-input wire:model.live="createForm.name" type="text" class="w-full mt-1"/>

                <x-input-error for="createForm.name"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Slug
                </x-label>
                <x-input disabled wire:model.live="createForm.slug" type="text" class="w-full mt-1 bg-gray-100"/>

                <x-input-error for="createForm.slug"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Marcas
                </x-label>
                <div class="grid grid-cols-4">
                    @foreach($brands as $brand)
                        <x-label>
                            <x-checkbox
                            wire:model.defer="createForm.brands"
                            name="brands[]"
                            value="{{$brand->id}}"/>
                            {{$brand->name}}
                        </x-label>
                    @endforeach
                </div>

                <x-input-error for="createForm.brands"/>
            </div>

        </x-slot>
        <x-slot name="actions">
            <x-action-message class="mr-3" on="saved">
                Categoria creada
            </x-action-message>
                <x-button>
                    Agregar
                </x-button>
        </x-slot>
    </x-form-section>

    <x-action-section>
        <x-slot name="title">
            Lista de categorias
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las categorías agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class= "text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($categories as $category)
                        <tr>
                            <td class="py-2">
                                <a href="{{route('admin.admin.categories.show', $category)}}" class="uppercase hover:underline hover:text-blue-600">
                                    {{$category->name}}
                                </a>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$category->slug}}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer" wire:click="delete('{{$category->slug}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-action-section>

    <x-dialog-modal wire:model="editForm.open" >
        <x-slot name="title">
            Editar categoría
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    <x-label class="mt-3">
                        Nombre
                    </x-label>

                    <x-input wire:model="editForm.name" type="text" class="w-full mt-1"/>

                    <x-input-error for="editForm.name"/>
                </div>

                <div>
                    <x-label>
                        Slug
                    </x-label>
                    <x-input disabled wire:model="editForm.slug" type="text" class="w-full mt-1 bg-gray-100"/>

                    <x-input-error for="editForm.slug"/>
                </div>

                <div>
                    <x-label>
                        Marcas
                    </x-label>
                    <div class="grid grid-cols-4">
                        @foreach($brands as $brand)
                            <x-label>
                                <x-checkbox
                                wire:model.defer="editForm.brands"
                                name="brands[]"
                                value="{{$brand->id}}"/>
                                {{$brand->name}}
                            </x-label>
                        @endforeach
                    </div>

                    <x-input-error for="editForm.brands"/>
                </div>
            </div>

        </x-slot>
        <x-slot name="footer">
            <x-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-danger-button>
        </x-slot>
    </x-dialog-modal>
</div>
