@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 pr-4 py-2 border-l-4 border-tb-active font-medium text-tb-active bg-tb focus:outline-none focus:text-tb focus:bg-tb-second focus:border-tb-active transition duration-150 ease-in-out'
            : 'block pl-3 pr-4 py-2 border-l-4 border-transparent font-medium text-tb-second hover:text-tb hover:bg-tb-second hover:border-tb-active focus:outline-none focus:text-tb focus:bg-tb-second focus:border-tb-active transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
