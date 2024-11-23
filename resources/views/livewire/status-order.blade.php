<div class="container bg-white shadow-xl rounded-lg py-4 px-6 mt-3 ">
    <p class="text-xl text-center font-semibold mb-3">Estado de Orden</p>
    <div class="flex">
        <div class="flex items-center">
            <label class="mr-6">
                <input wire:model="status" type="radio" name="status" value="1">
                Recibido
            </label>
            <label class="mr-6">
                <input wire:model="status" type="radio" name="status" value="2">
                Pagado
            </label>
            <label>
                <input wire:model="status" type="radio" name="status" value="3">
                Entregado
            </label>
        </div>

        <div class="flex ml-auto items-center">

            <x-action-message class="mr-3" on="saved">
                Actualizado
            </x-action-message>

            <x-button wire:click="save"
                wire:loading.attr="disabled"
                wire:target="save">
                Actualizar
            </x-button>

        </div>
    </div>
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-2 pb-8 mt-6">
        <div class= "bg-blue-100 rounded-2xl px-3 md:px-8 pb-7 pt-3 flex items-center">
            <div class="relative">
                <div
                    class="{{ $order->status >= 1 && $order->status != 4 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>
                <div class="absolute -left-1 mt0-0.5">
                    <p class="text-sm md:text-md md:font-semibold">Recibido</p>
                </div>
            </div>
            <div
                class="{{ $order->status >= 2 && $order->status != 4 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1  md:mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 2 && $order->status != 4 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12  flex items-center justify-center">
                    <i class="far fa-money-bill-alt text-white"></i>
                </div>
                <div class="absolute n-left-1 mt0-0.5">
                    <p class="text-sm md:text-md md:font-semibold">Pagado</p>
                </div>
            </div>

            <div
                class="{{ $order->status >= 3 && $order->status != 4 ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1   md:mx-2">
            </div>

            <div class="relative">
                <div
                    class="{{ $order->status >= 3 && $order->status != 4 ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fa fa-thumbs-up text-white"></i>
                </div>
                <div class="absolute -left-1 mt0-0.5">
                    <p class="text-sm md:text-md md:font-semibold pr-8">Entregado</p>
                </div>
            </div>
        </div>
    </div>
</div>
