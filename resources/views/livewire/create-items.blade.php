<div>
    <div>
        @if(Cart::count())
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                <div class="mb-4">
                    <x-label value="Nombre de cliente" />
                    <x-input type="text"
                    wire:model.defer="client" {{-- el ..defer hara que se actulice la info despues de presionar el boton continuar--}}
                    placeholder="Ingrese el nombre del cliente"
                    class="w-full"/>
                    <x-input-error for="client" />
                </div>
                <div class="w-full flex space-x-4">
                    <div class="w-1/2">
                        <x-label value="Dni de cliente" />
                        <x-input type="text"
                        wire:model.defer="dni" {{-- el ..defer hará que se actualice la info después de presionar el botón continuar --}}
                        placeholder="Ingrese el dni del cliente"
                        class="w-full"/>
                        <x-input-error for="dni" />
                </div>

                <div class="w-1/2">
                    <x-label value="Telefono de cliente" />
                    <x-input type="text"
                    wire:model.defer="phone"
                    placeholder="Ingrese un número de teléfono de contacto"
                    class="w-full"/>
                    <x-input-error for="phone" />
                </div>
            </div>

        @endif
    </div>
    <div>
        @if (Cart::count())
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-gray-700">
                            <span class="font-bold text-lg">Total: </span>
                            {{ Cart::subtotal() }}
                        </p>
                    </div>
                    <x-button wire:click="create_order" wire:loading.attr="disabled"
                        wire:target="create_order">
                        Enviar Pedido
                    </x-button>
                </div>
            </div>
        @endif
    </div>

</div>
