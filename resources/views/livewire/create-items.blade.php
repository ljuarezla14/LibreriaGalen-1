<div>
    <div>
        @if(Cart::count())
            <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-4">

                {{-- NOMBRE DEL CLIENTE - solo letras y espacios --}}
                <div class="mb-4">
                    <x-label value="Nombre de cliente" />
                    <x-input type="text"
                        wire:model.defer="client"
                        placeholder="Ingrese el nombre del cliente"
                        class="w-full"
                        pattern="[A-Za-zÁÉÍÓÚáéíóúÑñ\s]+"
                        title="Solo se permiten letras y espacios"
                        required
                        oninput="this.value = this.value.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'')"
                        onpaste="event.preventDefault(); const pasted = (event.clipboardData||window.clipboardData).getData('text'); this.value = pasted.replace(/[^A-Za-zÁÉÍÓÚáéíóúÑñ\s]/g,'');" />
                    <x-input-error for="client" />
                </div>

                {{-- DNI DEL CLIENTE - solo 8 dígitos --}}
                <div class="w-full flex space-x-4">
                    <div class="w-1/2">
                        <x-label value="DNI de cliente" />
                        <x-input type="text"
                            wire:model.defer="dni"
                            placeholder="Ingrese el DNI del cliente"
                            class="w-full"
                            inputmode="numeric"
                            maxlength="8"
                            minlength="8"
                            pattern="\d{8}"
                            title="Debe contener exactamente 8 números"
                            required
                            oninput="this.value = this.value.replace(/\D/g,'').slice(0,8)"
                            onpaste="event.preventDefault(); const pasted=(event.clipboardData||window.clipboardData).getData('text'); this.value = pasted.replace(/\D/g,'').slice(0,8);" />
                        <x-input-error for="dni" />
                    </div>

                    {{-- TELÉFONO DEL CLIENTE - solo 9 dígitos --}}
                    <div class="w-1/2">
                        <x-label value="Teléfono de cliente" />
                        <x-input type="text"
                            wire:model.defer="phone"
                            placeholder="Ingrese un número de teléfono de contacto"
                            class="w-full"
                            inputmode="numeric"
                            maxlength="9"
                            minlength="9"
                            pattern="\d{9}"
                            title="Debe contener exactamente 9 números"
                            required
                            oninput="this.value = this.value.replace(/\D/g,'').slice(0,9)"
                            onpaste="event.preventDefault(); const pasted=(event.clipboardData||window.clipboardData).getData('text'); this.value = pasted.replace(/\D/g,'').slice(0,9);" />
                        <x-input-error for="phone" />
                    </div>
                </div>

            </div>
        @endif
    </div>

    {{-- TOTAL Y BOTÓN --}}
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
                    <x-button wire:click="create_order" wire:loading.attr="disabled" wire:target="create_order">
                        Enviar Pedido
                    </x-button>
                </div>
            </div>
        @endif
    </div>
</div>
