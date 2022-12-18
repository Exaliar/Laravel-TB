<x-app-layout>
    <x-slot name="header">
        <h1 class="bg-tb text-center text-2xl font-semibold text-tb-second">
            {{ __('Nowości') }}
        </h1>
    </x-slot>

    <div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            @if (session()->has('success'))
                <x-alerts.success :message="session('success')" />
            @endif
            @if (session()->has('danger'))
                <x-alerts.danger :message="session('danger')" />
            @endif

            @error('floating_text')
                {{ $message }}
            @enderror
            @if (isset($articles))
                @can('isAdmin')
                    <div class="rounded bg-tb-second/5 p-6">
                        <x-article.create />
                    </div>
                @endcan
                <div class="border-b border-tb-second p-6">
                    <x-article.index :$articles />
                </div>
            @endif
            @if (isset($article))
                <div class="border-b border-tb-second p-6">
                    <x-article.show :$article />
                </div>
            @endif
            @if (isset($editArticle))
                <div class="border-b border-tb-second p-6">
                    <x-article.edit :$editArticle />
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
