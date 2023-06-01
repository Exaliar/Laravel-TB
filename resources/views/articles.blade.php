<x-app-layout>
    <x-slot name="header">
        <h1 class="bg-tb text-center text-2xl font-semibold text-tb-second">
            {{ __('Nowości') }}
        </h1>
    </x-slot>

    <div>
        <div class="mx-auto sm:px-6 lg:px-8">

            @if (session()->has('success'))
                <x-alerts.success :message="session('success')" />
            @endif
            @if (session()->has('danger'))
                <x-alerts.danger :message="session('danger')" />
            @endif

            @error('floating_text')
                {{ $message }}
            @enderror

            @can('isAdmin')
                <div class="rounded bg-tb-second/5 p-6">
                    <x-article.create />
                </div>
            @endcan

            @if (isset($articles))
                <x-article.index :$articles />
            @endif

            @if (isset($article))
                <x-article.show :$article />
            @endif

            @if (isset($editArticle))
                <x-article.edit :$editArticle />
            @endif
        </div>
    </div>
</x-app-layout>
