<x-admin>

    <div class="container py-12">

        <section class="grid lg:grid-cols-4 gap-6 text-white">
            <a href="{{ route('admin.admin.orders.index') . "?status=1"}}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$recibido}}
                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <img src="https://img.icons8.com/?size=100&id=ftv3foQkv3DY&format=png&color=000000" class=" m-auto h-12 w-12">
                </p>
            </a>
            <a href="{{route ('admin.admin.orders.index') . "?status=2"}}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$pagado}}
                </p>
                <p class="uppercase text-center">Pagado</p>
                <p class="text-center text-2xl mt-2">
                    <img src="https://img.icons8.com/?size=100&id=6b6cHlFYcvBS&format=png&color=000000" class=" m-auto h-12 w-12">
                </p>
            </a>
            <a href="{{route ('admin.admin.orders.index')."?status=3"}}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$entregado}}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <img src="https://img.icons8.com/?size=100&id=42857&format=png&color=000000" class=" m-auto h-12 w-12">
                </p>
            </a>
            <a href="{{route ('admin.admin.orders.index')."?status=5"}}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{$cancelado}}
                </p>
                <p class="uppercase text-center">Cancelado</p>
                <p class="text-center text-2xl mt-2">
                    <img src="https://img.icons8.com/?size=100&id=fYgQxDaH069W&format=png&color=000000" class=" m-auto h-12 w-12">
                </p>
            </a>
        </section>

            @if ($orders->count())
                <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-600">
                                <h1 class="text-2xl mb-4">Ordenes Recientes</h1>

                                <ul >
                                    @foreach ($orders as $order)
                                        <li>
                                            <a href="{{route('admin.admin.orders.show', $order)}}" class=" flex items-center py-2 px-4 hover:bg-gray-100">
                                            {{-- <a href="#" class="flex items-center py-2 px-4 hover:bg-gray-100"> --}}
                                                <span class="w-12 text-center">
                                                    @switch($order->status)
                                                        @case(1)
                                                            <img src="https://img.icons8.com/?size=100&id=ftv3foQkv3DY&format=png&color=000000" class=" h-12 w-12">
                                                            @break
                                                        @case(2)
                                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                                            @break
                                                        @case(3)
                                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                                            @break
                                                        @case(4)
                                                            <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                                            @break
                                                        @case(5)
                                                            <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                                            @break
                                                        @default

                                                    @endswitch
                                                </span>

                                                <span class="mr-4">
                                                    Orden: {{$order->id}}
                                                    <br>
                                                    {{$order->created_at->format('d/m/Y')}}
                                                    <br>
                                                    Cliente: {{$order->client}}
                                                    <br>
                                                    Vendedor: {{$order->user->name}}
                                                </span>
                                                <div class="ml-auto">
                                                    <span font-bold>
                                                            @switch($order->status)
                                                                @case(1)
                                                                    Recibido
                                                                    @break
                                                                @case(2)
                                                                    Pagado
                                                                    @break
                                                                @case(3)
                                                                    Entregado
                                                                    @break
                                                                @case(4)
                                                                    Cancelado
                                                                    @break
                                                                @default

                                                            @endswitch
                                                    </span>
                                                    <br>
                                                    <span text-sm>
                                                        S/.{{$order->total}}
                                                    </span>
                                                </div>
                                                <span>
                                                    <i class="fas fa-angle-right ml-6"></i>
                                                    {{-- <i class="fa-solid fa-arrow-right ml-6"></i> --}}
                                                </span>
                                            </a>

                                        </li>
                                    @endforeach
                                </ul>
                </section>
            @else
                <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-600">
                    <span class="font-bold" text-1g>
                        No existe Registro de Ordenes
                    </span>
                </div>
            @endif


    </div>

</x-admin>

