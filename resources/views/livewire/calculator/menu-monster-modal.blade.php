<div>
    <section>
        <legend class="w-full bg-purple-700 p-2 text-center text-tb-second">Przeciwnik</legend>
        <div class="grid grid-flow-row grid-cols-4 text-center">
            <span>Rodzaj</span>
            <span>Lvl</span>
            <span>Typ</span>
            <span>Menu</span>
            <span>{{ $monster['kind'] }}</span>
            <span>{{ $monster['lvl'] }}</span>
            <span>{{ $monster['type'] }}</span>
            <button wire:click="toggleModal">Zmień</button>
        </div>
    </section>
    <section
        class="@if (!$visibility) hidden @endif fixed top-0 left-0 bottom-0 right-0 z-50 bg-white/30 backdrop-blur-[2px]">


        {{-- input hiden --}}
        <input class="peer/monster-menu hidden" id="monster-menu" name="monster-menu" type="checkbox" />

        {{-- input label --}}
        <label
            class="peer-checked/monster-menu:rotate-180 absolute left-2 top-2 cursor-pointer rounded-md bg-gray-200 transition-all hover:bg-gray-300 md:hidden"
            for="monster-menu">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
            </svg>
        </label>
        {{-- close button --}}
        <button class="absolute right-2 top-2 rounded-md bg-red-600 text-tb transition-all hover:bg-red-500"
            wire:click="hideMonsterMenuModal">
            <svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <menu
            class="peer-checked/monster-menu:left-0 relative top-14 -left-[100%] flex h-full w-[200%] bg-slate-100 transition-all md:left-0 md:w-full">

            {{-- main menu nawigation --}}
            <ul class="flex h-full w-screen flex-col gap-2 bg-slate-800">

                @forelse ($squadTypes as $type)
                    <li>
                        <input class="peer hidden" id="{{ $type }}" name="monster-menu-typ" type="radio"
                            @if ($loop->first) checked @endif />
                        <label
                            class="block h-10 w-full bg-tb px-4 py-2 text-center text-tb-second first-letter:uppercase peer-checked:bg-tb-active peer-checked:text-tb md:w-1/6"
                            for="{{ $type }}">{{ $type }}</label>
                        <div
                            class="absolute top-0 right-0 hidden h-screen w-screen bg-blue-400 peer-checked:block md:w-5/6">

                            <ul class="bg-blue-700">
                                <li class="flex h-screen w-full">
                                    <div class="h-full w-1/6 bg-white"></div>
                                    <div class="h-full w-5/6 bg-black">
                                        <h2 class="text-center text-white first-letter:uppercase">{{ $type }}
                                        </h2>
                                    </div>

                                </li>
                            </ul>

                        </div>
                    </li>
                @empty
                    <p>BRAK</p>
                @endforelse

        </menu>
    </section>
</div>
