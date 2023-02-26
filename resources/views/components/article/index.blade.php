@if (isset($articles) && !empty($articles))
    <section>
        @foreach ($articles as $article)
            <article
                class="mx-auto mb-4 h-auto overflow-auto border-b border-tb-second border-opacity-50 text-tb-second">
                <div class="flex">
                    <h3 class="block h-10 w-10 rounded-full bg-tb-second/10 text-center leading-10">
                        {{ $article->user->avatar() }}</h3>
                    <h3 class="pl-3 leading-10">{{ $article->user->fullName() }}</h3>
                </div>
                <h2 class="py-2 font-bold">{{ $article->title }}</h2>
                <small class="my-4 text-xs text-opacity-60">Dodany:
                    {{ $article->created_at->diffForHumans(['parts' => 3]) }}
                </small><br><br>
                <div class="container">
                    @if ($article->photo_path == !null)
                        <img class="float-left mb-4 block w-full after:clear-both sm:mr-4 sm:mb-4 sm:w-64"
                            src="{{ $article->photo_path }}">
                    @endif
                    <p class="pb-2 text-justify">{{ $article->description }}</p>
                </div>
                <div class="flex flex-col pb-3">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('article.show', $article->id) }}">
                            <x-primary-button class="my-3">
                                Czytaj więcej
                            </x-primary-button>
                        </a>
                        @can('isAdmin')
                            <a href="{{ route('article.edit', $article->id) }}">
                                <x-buttons.edit class="my-3">
                                    Edytuj
                                </x-buttons.edit>
                            </a>
                            <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <x-buttons.delete class="my-3" type="submit"
                                    onclick="return confirm('Napewno usunąć wybrany post?')">
                                    Usuń
                                </x-buttons.delete>
                            </form>
                        @endcan
                    </div>
                    <div class="flex flex-wrap gap-6">
                        <a class="flex flex-row" href="#">
                            <svg class="mr-2 h-6 w-6 stroke-tb-second" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>
                            <span>123</span>
                        </a>
                        <a class="flex flex-row" href="#">
                            <svg class="mr-2 h-6 w-6 stroke-tb-second" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12.76c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.076-4.076a1.526 1.526 0 011.037-.443 48.282 48.282 0 005.68-.494c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                            </svg>
                            <span>321</span>
                        </a>
                    </div>
                </div>
            </article>
        @endforeach
    </section>
@else
    <section>
        <span>Brak aktualnych wpisów</span>
    </section>
@endif
