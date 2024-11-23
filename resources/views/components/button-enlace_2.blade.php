@props(['color' => 'red' ])

<a {{ $attributes->merge(['type' => 'button', 'class' => "inline-flex justify-center items-center px-1 py-1 bg-red-500 border border-transparent rounded-2xl cursor-pointer font-semibold text-xs text-white uppercase tracking-widest hover:bg-$color-600 active:bg-$color-500 focus:outline-none focus:border-$color-500 focus:ring focus:ring-$color-300 disabled:opacity-25 transition"]) }}>
    {{ $slot }}
</a>
