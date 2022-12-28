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
    <menu
        class="@if (!$visibility) hidden @endif absolute top-0 left-0 bottom-0 right-0 z-50 h-screen w-screen overflow-hidden bg-white/20"
        {{-- wire:click.prevent="hideModal" --}}>

        <input class="peer/monster-menu-typ hidden" id="monster-menu-typ" name="monster-menu-typ" type="checkbox">

        <label
            class="peer-checked/monster-menu-typ:left-3/4 peer-checked/monster-menu-typ:ml-2 peer-checked/monster-menu-typ:rotate-180 relative left-2 top-2 inline-block transition-all"
            for="monster-menu-typ">
            <svg class="h-8 w-8 rounded-md bg-tb-second/80" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M11.25 4.5l7.5 7.5-7.5 7.5m-6-15l7.5 7.5-7.5 7.5" />
            </svg>
        </label>
        <div
            class="peer-checked/monster-menu-typ:left-0 absolute top-0 -left-3/4 h-screen w-3/4 bg-tb-second/40 transition-all">
        </div>
    </menu>
</div>
