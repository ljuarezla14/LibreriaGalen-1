<div class=" bg-repeat bg-scroll ">
    <x-app-layout>
        <div class="container">
            <div class=" flex justify-between items-center rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                <p class="text-gray-600 text-lg md:text-lg text-left font-indie font-semibold ml-1">Vendedor:
                    {{ $order->user->name }} </p>
                <div class="flex items-center text-center">
                    {{-- <img src="/img/camarero.png" width="34" alt="" class="ml-2"> --}}
                    <h1 class="text-gray-600 text-lg md:text-2xl uppercase text-left font-indie font-semibold">
                        Orden - {{ $order->id }}</h1>
                </div>
            </div>

            @livewire('status-order', ['order' => $order], key('status-order-' . $order->id))

            {{-- prueba --}}

            {{-- fin prueba --}}
            <div class="flex items-center justify-center rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                <h1 class="text-gray-600 text-2xl  text-left font-indie font-semibold mr-4">Lista</h1>
                <x-pedido />
            </div>
            <div class="py-4 ">
                <x-table-responsive>
                    <table class="min-w-full divide-y divide-gray-200 ">
                        <thead class="bg-gray-50">
                            <tr class="bg-white">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Precio
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Cantidad
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Total
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="ml-4">
                                                <i class="far fa-check-circle text-green-500"></i>
                                                <a class="text-sm font-medium text-gray-900 uppercase">
                                                    {{ $item->name }}
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-center text-gray-500">
                                            <span>S/ {{ $item->price }}</span>

                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm  text-center text-gray-500">
                                            {{ $item->qty }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        <div class="text-sm text-center text-gray-500">
                                            {{ $item->price * $item->qty }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-table-responsive>
                <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                    <div class="mb-4">
                        <x-label value="Nombre de cliente" />
                        <p type="text"
                            class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-100 text-gray-400 font-semibold text-md"
                            disabled>{{ $order->client }}</p>

                    </div>

                    <div class="mb-4">
                        <x-label value="Dni de cliente" />
                        <p type="text"
                            class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-100 text-gray-400 font-semibold text-md"
                            disabled>{{ $order->dni }}</p>

                    </div>

                    <div class="mb-4">
                        <x-label value="Celular de cliente" />
                        <p type="text"
                            class="w-full border-gray-200 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm bg-gray-100 text-gray-400 font-semibold text-md"
                            disabled>{{ $order->phone }}</p>

                    </div>

                </div>
                <div class="flex justify-between  items-center bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                    <p class="text-gray-700">
                        <span class="font-bold text-lg">Total: </span>
                        S/ {{ str_replace(',', '', $order->total) }}
                    </p>

                    <a href="/" class=" px-4 py-2 bg-[#28617A] rounded-lg text-white">
                        Ir al inicio
                    </a>
                </div>
                @if ($order->status == 1 )
                    <div>
                        <div class="container">
                            <div
                                class="flex justify-center items-center rounded-lg shadow-lg px-6 py-4 mt-4 bg-white ">
                                <p class="text-gray-600 text-2xl  text-center font-indie"><span
                                        class="font-semibold mr-2 text-md md:text-2xl ">¿Faltó algún
                                        producto...?</span></p>
                                {{-- <x-add-list size="40" /> --}}
                            </div>

                            <div class=" bg-blue-200 rounded-lg shadow-lg px-2 md:px-6 py-4 mt-6 md:mx-12 mb-6">
                                <div class="flex">
                                    @livewire('search')
                                </div>
                            </div>

                            {{-- Tabla cart new --}}
                            @livewire('table-cart')
                            {{-- fin tabla cart new --}}
                            <div class="flex justify-center items-center mt-4">
                                <a href="{{ route('orders.create', $order) }}"
                                    class="bg-[#28617A]  py-4 w-full text-center md:px-8 md:py-2 md:pt-3 rounded-lg text-white text-sm md:text-lg hover:opacity-80">Enviar
                                    pedido</a>
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
        @push('script')
            <script>
                Livewire.on('delete', (id, order) => {
                    console.log('id', 'order');
                    Livewire.dispatch('delete', id, order);
                });
            </script>
        @endpush
    </x-app-layout>
</div>
