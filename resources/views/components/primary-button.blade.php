<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-tb-second border border-transparent rounded-md font-semibold text-xs text-tb uppercase tracking-widest hover:bg-tb-active active:bg-tb-active focus:outline-none focus:border-tb-active focus:ring ring-tb-active disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
