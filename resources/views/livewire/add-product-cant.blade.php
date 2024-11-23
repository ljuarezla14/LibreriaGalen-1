<div x-data>
    <div class="flex justify-center">
        <x-secondary-button
            disabled
            x-bind:disabled="$wire.qty <= 1"
            wire:loading.attr="disabled"
            wire:target="decrement"
            wire:click="decrement" >
            -
        </x-secondary-button>

        <span class="flex items-center mx-2 text-gray-700">{{$qty}}</span>

        <x-secondary-button wire:click="increment">
            +
        </x-secondary-button>
    </div>


</div>
