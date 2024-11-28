<div class="container py-12">

    {{-- Formulario crear categoria  --}}
    <x-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nueva subcategoria
        </x-slot>
        <x-slot name="description">
            Complete la informacion necesaria para poder crear una nueva subcategoria
        </x-slot>
        <x-slot name="form">
            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Nombre
                </x-label>

                <x-input wire:model.live="nameCreate" type="text" class="w-full mt-1"/>

                <x-input-error for="nameCreate"/>
            </div>

            <div class="col-span-6 sm:col-span-4">
                <x-label>
                    Slug
                </x-label>
                <x-input disabled wire:model.live="slugCreate" type="text" class="w-full mt-1 bg-gray-100"/>

                <x-input-error for="slugCreate"/>
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

    {{-- Lista de subcategorias --}}
    <x-action-section>
        <x-slot name="title">
            Lista de subcategorias
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las subcategorías agregadas
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
                    @foreach ($subcategories as $subcategory)
                        <tr>
                            <td class="py-2">

                                <span class="uppercase">
                                    {{$subcategory->name}}
                                </span>
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer" wire:click="edit('{{$subcategory->id}}')">Editar</a>
                                    <a type="submit" class="pl-2 hover:text-red-600 cursor-pointer" wire:click="delete('{{$subcategory->id}}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-action-section>

    {{-- Modal Editar --}}
    <x-dialog-modal wire:model="open" wire:ignore>
        <x-slot name="title">
            Editar subcategoría
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">

                <div>
                    <x-label class="mt-3">
                        Nombre
                    </x-label>

                    <x-input wire:model="nameEdit" type="text" class="w-full mt-1"/>

                    <x-input-error for="nameEdit"/>
                </div>

                <div>
                    <x-label>
                        Slug
                    </x-label>
                    <x-input disabled wire:model="slugEdit" type="text" class="w-full mt-1 bg-gray-100"/>

                    <x-input-error for="slugEdit"/>
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
