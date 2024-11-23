<div class="container py-12">

    {{-- Lista de subcategorias --}}
    <x-action-section>
        <x-slot name="title">
            Lista de Marcas
        </x-slot>

        <x-slot name="description">
            Aquí encontrará todas las marcas agregadas
        </x-slot>

        <x-slot name="content">

            <table class="text-gray-600">
                <thead class="border-b border-gray-300">
                    <tr class= "text-left">
                        <th class="py-2 w-full">Nombre</th>
                        <th class="py-2"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($brands as $brand)
                        <tr>
                            <td class="py-2">

                                <span class="uppercase">
                                    {{$brand->name}}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-action-section>


</div>
