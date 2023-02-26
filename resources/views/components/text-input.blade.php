@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-tb-second focus:border-tb-active focus:ring focus:ring-tb-active focus:ring-opacity-50']) !!}>
