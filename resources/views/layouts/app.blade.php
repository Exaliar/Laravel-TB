<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Syles -->
    @livewireStyles
</head>

<body class="bg-tb font-sans antialiased">
    {{-- <section class="min-h-screen "> --}}
    @include('layouts.navigation')

    {{-- <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-tb pt-16 shadow">
            <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif --}}

    <!-- Page Content -->
    <main class="border-b border-tb-second p-3 pt-20">
        {{ $slot }}
    </main>

    <!-- Page Footer -->
    @include('layouts.footer')
    {{-- </section> --}}
    {{-- <!-- Livewire Script --> --}}
    @livewireScripts
</body>

</html>
