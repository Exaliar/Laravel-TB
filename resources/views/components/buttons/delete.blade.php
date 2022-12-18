<button
    {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-tb uppercase tracking-widest hover:bg-red-600 active:bg-tb-active focus:outline-none focus:border-tb-active focus:ring ring-tb-active disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
