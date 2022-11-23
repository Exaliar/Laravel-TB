@props(['active'])

@php
    $classes = $active ?? false ? 'relative inline-flex items-center text-sm font-medium text-tb-active focus:outline-none focus:border-tb-active focus:text-tb-active/50 transition duration-150 ease-in-out' : 'relative overflow-hidden inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-tb-second hover:text-tb-active hover:border-tb-second focus:outline-none focus:text-tb-active transition duration-150 ease-in-out';

    $spanClases = $active ?? false ? 'absolute border-b-4 w-full right-full border-tb-active bottom-1 left-0 rounded-sm' : 'absolute border-b-4 w-0 border-tb-active bottom-1 left-0 rounded-sm group-hover:w-full group-hover:right-full transition-all duration-150 ease-linear';
@endphp
<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
    <span {{ $attributes->merge(['class' => $spanClases]) }}>
    </span>
</a>
