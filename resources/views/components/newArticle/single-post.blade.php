@if (isset($articles) && !empty($articles))
    <section class="">
        @foreach ($articles as $article)
            <article class="h-auto overflow-auto border-b border-tb-second border-opacity-50 mx-auto">
                <h2 class="py-6 text-tb-second text-xl">{{ $article->title }}</h2>
                @if ($article->photo_path == !null)
                    <img src="{{ $article->photo_path }}"
                        class="w-full float-left after:clear-both sm:w-64 sm:mr-4 sm:mb-4 block rounded-lg">
                @endif
                <p class="text-justify pb-12 text-tb-second">{{ $article->description }}</p>
                <p class="text-justify pb-12 text-tb-second">{{ $article->description }}</p>
                <p class="text-justify pb-12 text-tb-second">{{ $article->description }}</p>
                <small
                    class="text-xs text-tb-second text-opacity-60">{{ $article->created_at->diffForHumans(['parts' => 3]) }}<br />
                    Dodany przez: {{ $article->user->name }}</small><br />
                <a href="{{ route('home') }}">
                    <x-primary-button class="mb-8 mt-4">
                        Czytaj więcej
                    </x-primary-button>
                </a>
            </article>
        @endforeach
    </section>
    @foreach ($articles as $article)
        <span>{{ $article->description }}</span>
        <hr>
    @endforeach
@else
    <span>Brak aktualnych wpisów</span>
@endif


{{-- 'title' => $this->faker->name(),
            'photo_path' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'user_id' => User::all()->random()->id,
            'created_at' => now() --}}
