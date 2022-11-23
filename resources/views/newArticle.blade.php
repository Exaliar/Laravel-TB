<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl bg-tb text-center text-tb-second leading-tight">
            {{ __('Nowości') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-yellow-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-tb border-b border-tb-second">
                    <x-newArticle.single-post :$articles />
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
