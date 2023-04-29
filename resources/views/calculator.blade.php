<x-app-layout>
    <x-slot name="header">
        <h1 class="bg-tb text-center text-xl font-semibold leading-tight text-tb-second">
            {{ __('Kalkulator') }}
        </h1>
    </x-slot>

    <div class="py-12">

        <x-calculator.section-title>przeciwnicy</x-calculator.section-title>

        <x-calculator.monsters-section />

        <x-calculator.section-title>wybrany przeciwnik</x-calculator.section-title>

        <x-calculator.monster-selected-section />

        <x-calculator.section-title>armia</x-calculator.section-title>

        <x-calculator.army-section />

        <x-calculator.section-title>wybrane jednostki</x-calculator.section-title>

        <x-calculator.army-selected-section />

        <x-calculator.section-title>Panel urzytkownika</x-calculator.section-title>

        <x-calculator.user-section />

        <x-calculator.section-title>Raport</x-calculator.section-title>

        <x-calculator.raport />
    </div>
</x-app-layout>
