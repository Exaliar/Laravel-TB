<div>
    <section>
        <legend class="w-full bg-purple-700 p-2 text-center text-tb-second">Przeciwnik</legend>
        <div class="grid grid-flow-row grid-cols-4 text-center">
            <span>Rodzaj</span>
            <span>Lvl</span>
            <span>Typ</span>
            <span>Menu</span>
            <span>{{ $monster['type'] }}</span>
            <span>{{ $monster['lvl'] }}</span>
            <span>{{ $monster['kind'] }}</span>
            <button wire:click="toggleModal">Zmień</button>
        </div>
    </section>
    <section class="@if (!$visibility) hidden @endif fixed inset-0 z-50 bg-white/30 backdrop-blur-[2px]">


        {{-- input hiden --}}
        {{-- <input class="peer/monster-menu hidden" id="monster-menu" name="monster-menu" type="checkbox" /> --}}

        {{-- input label --}}
        {{-- <label
            class="absolute left-2 top-2 cursor-pointer rounded-md bg-gray-200 transition-all hover:bg-gray-300 peer-checked/monster-menu:rotate-180 md:hidden"
            for="monster-menu">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
            </svg>
        </label> --}}
        {{-- close button --}}
        <button class="absolute right-2 top-2 rounded-md bg-red-600 text-tb transition-all hover:bg-red-500"
            wire:click="hideMonsterMenuModal">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <menu class="relative top-14 h-full w-full bg-slate-800 transition-all">

            {{-- main menu nawigation --}}
            <ul class="relative mx-auto flex h-full w-[320px] flex-col gap-4 pt-4 sm:w-[600px]">

                @forelse ($squadTypes as $type)
                    <li class="w-full">
                        <input class="peer hidden" id="{{ $type }}" name="monster-menu-typ" type="radio"
                            @if ($loop->first) checked @endif />
                        <label
                            class="block h-10 w-1/4 bg-tb text-center leading-10 text-tb-second first-letter:uppercase hover:border-b-2 hover:border-tb-active peer-checked:bg-tb-active peer-checked:text-tb"
                            for="{{ $type }}">{{ $type }}</label>
                        <div
                            class="duration-50 absolute left-1/4 top-[120%] ml-4 h-full w-3/4 opacity-0 transition-all peer-checked:top-4 peer-checked:opacity-100 md:w-[calc(100%_-_100px)]">

                            <ul class="flex flex-col gap-4">

                                {{-- cell contains type part example normal, rare, heroic, etc --}}
                                {{-- loop where be count elements of each type ~55lvls --}}

                                @foreach (['0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'] as $i)
                                    <li class="w-full">

                                        {{-- hidden input --}}
                                        <input class="peer hidden" id="{{ $type . '-lvl-' . $i }}"
                                            name="monster-menu-lvls" type="radio"
                                            @if ($loop->first) checked @endif />

                                        {{-- label to hidden input --}}
                                        <label
                                            class="block h-10 w-1/4 bg-tb text-center leading-10 text-tb-second first-letter:uppercase hover:border-b-2 hover:border-tb-active peer-checked:bg-tb-active peer-checked:text-tb"
                                            for="{{ $type . '-lvl-' . $i }}">{{ $i * 5 + 1 . '-' . $i * 5 + 5 }}</label>


                                        <div
                                            class="duration-50 absolute left-1/4 top-[120%] ml-4 h-full w-3/4 opacity-0 transition-all peer-checked:top-0 peer-checked:opacity-100">

                                            {{-- cell contains type part example lvl 1-5, lvl 6-10, lvl 11-15, etc --}}
                                            <ul class="flex flex-col gap-4">
                                                @for ($j = 0; $j < 5; $j++)
                                                    <li class="w-full">

                                                        {{-- hidden input --}}
                                                        <input class="peer hidden" id="{{ $type . '-lvl-' . $i . $j }}"
                                                            name="monster-menu-lvls-beetween" type="radio"
                                                            @if ($loop->first) checked @endif />

                                                        {{-- label to hidden input --}}
                                                        <label
                                                            class="block h-10 w-1/4 bg-tb text-center leading-10 text-tb-second first-letter:uppercase hover:border-b-2 hover:border-tb-active peer-checked:bg-tb-active peer-checked:text-tb"
                                                            for="{{ $type . '-lvl-' . $i . $j }}">{{ $i * 5 + 1 + $j }}</label>
                                                        <div
                                                            class="duration-50 absolute left-1/4 top-[120%] ml-4 h-full w-3/4 opacity-0 transition-all peer-checked:top-0 peer-checked:opacity-100">

                                                            <ul class="flex flex-col gap-4">
                                                                @foreach (['Nieumrły', 'Elf', 'Wyklęty', 'Barbarzyńca', 'Piekielny'] as $kind)
                                                                    <li class="w-full">

                                                                        {{-- label to hidden input --}}
                                                                        <button
                                                                            class="block h-10 w-3/4 bg-tb text-center leading-10 text-tb-second first-letter:uppercase hover:border-b-2 hover:border-tb-active peer-checked:bg-tb-active peer-checked:text-tb"
                                                                            wire:click="changeMonster('{{ $type }}', {{ $i }}, {{ $j }}, '{{ $kind }}')">{{ $kind }}</button>

                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </li>
                                                @endfor
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                                {{-- @endfor --}}


                            </ul>

                        </div>
                    </li>
                @empty
                    <p>BRAK</p>
                @endforelse
            </ul>
        </menu>
    </section>
</div>
