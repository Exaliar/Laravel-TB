<div class="relative flex w-full flex-col text-tb">
    {{-- Wybrany Squad Armii: --}}
    {{-- <pre>
        {{ $monsterFromDatabase ? dd($monsterFromDatabase) : 'brak' }}
        </pre> --}}
    {{-- <pre>
        {{ $armySelected ? dump($armySelected) : 'brak' }}
        </pre>
    <br> --}}

    @forelse ($armySelected as $key => $army)
        <section class="w-full items-center border-b border-tb-second pt-2 text-sm text-tb-second">
            <div class="flex flex-row items-center pb-2 pr-4">
                <span class="w-1/3 px-4">#{{ $key + 1 }}</span>
                <div class="flex items-center">
                    <p class="mr-4">{{ $army['render']['nazwa'] }}</p>
                    <x-buttons.lvl-army-info colorType="{{ $army['render']['lvl'] }}"
                        text="{{ $army['render']['lvl'] }}" />
                </div>
            </div>
            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="ilosc{{ $key }}">Ilość</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="ilosc{{ $key }}" type="number" placeholder="Ilość jenostek"
                    wire:model.debounce.1500ms="armySelected.{{ $key }}.ilosc">
            </div>

            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="bonusAP{{ $key }}">Bonus Ataku</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="bonusAP{{ $key }}" type="number" placeholder="Bonus ataku w %"
                    wire:model.debounce.1500ms="armySelected.{{ $key }}.bonusAP">
            </div>

            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="bonusHP{{ $key }}">Bonus Życia</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="bonusHP{{ $key }}" type="number" placeholder="Bonus życia w %"
                    wire:model.debounce.1500ms="armySelected.{{ $key }}.bonusHP">
            </div>

            <div class="flex flex-row items-center pb-2 pr-4">
                <span class="w-1/3 px-4">Akcja</span>
                <button
                    class="mr-4 flex items-center space-x-2 rounded-lg border border-green-700 bg-green-600 py-1.5 px-4 font-medium text-white transition-colors hover:bg-green-700 active:bg-green-800 disabled:opacity-50">
                    Rozwiń
                    <svg class="ml-2 fill-current text-green-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                        width="16" height="16">
                        <path fill-rule="evenodd"
                            d="M12.78 6.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.22 7.28a.75.75 0 011.06-1.06L8 9.94l3.72-3.72a.75.75 0 011.06 0z">
                        </path>
                    </svg>
                </button>
                <button
                    class="flex items-center space-x-2 rounded-lg border border-red-700 bg-red-600 py-1.5 px-4 font-medium text-white transition-colors hover:bg-red-700 active:bg-red-800 disabled:opacity-50">
                    Usuń
                    <svg class="ml-2 fill-current text-green-100" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>
            </div>
        </section>
    @empty
        <p>BRAK</p>
    @endforelse
    {{-- <input class="peer/arrow hidden" id="showHideMonster" name="" type="checkbox">
    <div class="flex h-16 flex-row p-2 sm:h-10">
        <span class="pr-4 sm:pr-8"><b>Rodzaj:</b> {{ $monsterSquad->squad_type ?? 'brak' }}</span>
        <span class="pr-4 sm:pr-8"><b>Lvl:</b> {{ $monsterSquad->lvl ?? 'brak' }}</span>
        <span class="pr-4 sm:pr-8"><b>Typ:</b> {{ $monsterSquad->type ?? 'brak' }}</span>
    </div> --}}

    {{-- <div class="odd flex w-full flex-col overflow-hidden transition-all duration-500">

        @forelse ($armySelected as $army)
            <div class="first flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Nazwa:
                </span>
                <span class="text-md block w-1/2">
                    {{ $army['render']['nazwa'] }}
                </span>
            </div>
            <div class="flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Typ:
                </span>
                <span class="text-md flex w-1/2">
                    @foreach ($army['render']['typ'] as $typ)
                        <p class="pr-2">{{ !$loop->last ? $typ . ', ' : $typ }}</p>
                    @endforeach
                </span>
            </div>

            <div class="flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Ilość:
                </span>
                <span class="text-md block w-1/2">
                    ({{ $army['render']['mnoznik'] }}x)
                    {{ number_format($army['render']['ilosc'], 0, '.', ' ') }}
                </span>
            </div>
            @foreach ($army['render']['atak'] as $atak)
                <div class="flex pl-2 odd:bg-tb-second/10">
                    <span class="block w-1/2 text-sm">
                        Atak {{ $loop->first ? '' : $atak['bonus'] . '%' }} {{ $atak['nazwa'] }}:
                    </span>
                    <span class="text-md block w-1/2">
                        {{ number_format($atak['total_atak'], 2, '.', ' ') }}
                    </span>
                </div>
            @endforeach


            <div class="flex border-b pl-2">
                <span class="block w-1/2 text-sm">
                    Życie:
                </span>
                <span class="text-md block w-1/2">
                    {{ number_format($army['render']['zycie'], 2, '.', ' ') }}
                </span>
            </div>
        @empty
            <span>Brak wybranego przeciwnika</span>
        @endforelse


    </div> --}}
    {{-- <button
        class="absolute top-2 right-2 cursor-pointer text-green-500 transition-all duration-500 peer-checked/arrow:opacity-0 sm:right-1 sm:top-0">
        <label for="showHideMonster">
            <svg class="h-10 w-10" wire:click.prefetch="getSquadDetal" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
            </svg>
        </label>
    </button>
    <button
        class="absolute top-2 right-2 cursor-pointer text-red-500 opacity-0 transition-all duration-500 peer-checked/arrow:opacity-100 sm:right-1 sm:top-0">
        <label for="showHideMonster">
            <svg class="h-10 w-10" wire:click.prefetch="getSquadDetal" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
            </svg>
        </label>
    </button> --}}
</div>
