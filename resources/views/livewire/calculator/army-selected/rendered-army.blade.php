<div class="flex w-full flex-col text-tb">
    @forelse ($armySelected as $key => $army)
        <section class="w-full items-center border-b border-tb-second pt-2 text-sm text-tb-second last:border-0"
            wire:key="army-selected-{{ $key }}">
            <div class="flex flex-row items-center pb-2 pr-4">
                <span class="w-1/3 px-4">#{{ $key + 1 }}</span>
                <div class="flex items-center">
                    <span class="mr-4">{{ $army['render']['nazwa'] }}</span>
                    <x-buttons.lvl-army-info colorType="{{ $army['render']['lvl'] }}"
                        text="{{ $army['render']['lvl'] }}" />
                </div>
            </div>
            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="ilosc{{ $key }}">Ilość</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="ilosc{{ $key }}" type="text" placeholder="Ilość jenostek"
                    wire:model.debounce.1s="armySelected.{{ $key }}.ilosc">
            </div>
            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="bonusAP{{ $key }}">Bonus Ataku</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="bonusAP{{ $key }}" type="text" placeholder="Bonus ataku w %"
                    wire:model.debounce.1s="armySelected.{{ $key }}.bonusAP">
            </div>
            <div class="flex flex-row items-center pb-2 pr-4">
                <label class="w-1/3 px-4" for="bonusHP{{ $key }}">Bonus Życia</label>
                <input
                    class="block rounded border border-gray-200 bg-gray-100 py-1 px-3 text-gray-700 focus:border-blue-500 focus:ring-blue-500"
                    id="bonusHP{{ $key }}" type="text" placeholder="Bonus życia w %"
                    wire:model.debounce.1s="armySelected.{{ $key }}.bonusHP">
            </div>
            <div class="flex flex-row flex-wrap items-center pb-2 pr-4">
                <span class="w-1/3 px-4">Akcja</span>
                <label
                    class="mr-4 flex items-center space-x-2 rounded-lg border border-green-700 bg-green-600 py-1.5 px-4 font-medium text-white transition-colors hover:bg-green-700 active:bg-green-800 disabled:opacity-50"
                    for="army{{ $key }}">
                    Rozwiń
                    <svg class="ml-2 fill-current text-green-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"
                        width="16" height="16">
                        <path fill-rule="evenodd"
                            d="M12.78 6.22a.75.75 0 010 1.06l-4.25 4.25a.75.75 0 01-1.06 0L3.22 7.28a.75.75 0 011.06-1.06L8 9.94l3.72-3.72a.75.75 0 011.06 0z">
                        </path>
                    </svg>
                </label>
                <button
                    class="flex items-center space-x-2 rounded-lg border border-red-700 bg-red-600 py-1.5 px-4 font-medium text-white transition-colors hover:bg-red-700 active:bg-red-800 disabled:opacity-50"
                    wire:click="removeArmyUnit({{ $key }})">
                    Usuń
                    <svg class="ml-2 fill-current text-green-100" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <input class="peer/army hidden" id="army{{ $key }}" name="" type="checkbox">
            <div
                class="odd flex max-h-0 w-full flex-1 flex-col overflow-hidden transition-all duration-500 peer-checked/army:max-h-[500px]">
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
                @foreach ($army['render']['atak'] as $atak)
                    @if ($atak['nazwa'] !== null)
                        <div class="flex pl-2 odd:bg-tb-second/10">
                            <span class="block w-1/2 text-sm">
                                Atak {{ $loop->first ? '' : $atak['bonus'] . '%' }} {{ $atak['nazwa'] }}:
                            </span>
                            <span class="text-md block w-1/2">
                                {{ number_format($atak['total_atak'], 2, '.', ' ') }}
                            </span>
                        </div>
                    @endif
                @endforeach
                <div class="flex border-b pl-2">
                    <span class="block w-1/2 text-sm">
                        Życie:
                    </span>
                    <span class="text-md block w-1/2">
                        {{ number_format($army['render']['zycie_all'], 2, '.', ' ') }}
                    </span>
                </div>
            </div>
        </section>
    @empty
        <p class="py-2 text-center text-tb-second">BRAK</p>
    @endforelse
</div>
