@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-tb-active text-sm font-medium leading-5 text-tb-active focus:outline-none focus:border-tb-active focus:text-tb-active/50 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-tb-second hover:text-tb-active hover:border-tb-second focus:outline-none focus:text-tb-active transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
