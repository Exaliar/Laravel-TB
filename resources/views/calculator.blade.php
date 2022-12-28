<x-app-layout>
    <x-slot name="header">
        <h1 class="bg-tb text-center text-xl font-semibold leading-tight text-tb-second">
            {{ __('Kalkulator') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <livewire:calculator.calculator />
    </div>
</x-app-layout>
