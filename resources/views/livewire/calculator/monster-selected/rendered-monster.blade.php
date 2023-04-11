<div class="relative flex w-full flex-col text-tb-second">
    {{-- Wybrany Squad: --}}
    {{-- <pre>
        {{ $monsterFromDatabase ? dd($monsterFromDatabase) : 'brak' }}
        </pre> --}}
    {{-- <pre>
        {{ $monsterSquadDetal ? dd($monsterSquadDetal) : 'brak' }}
        </pre>
    <br> --}}

    <input class="peer/arrow hidden" id="showHideMonster" name="" type="checkbox">
    @if (isset($monsterSelected['squad_type']))
        <div class="flex h-16 flex-row p-1 sm:h-10">
            <span class="pr-4 sm:pr-8"><b>Rodzaj:</b> {{ $monsterSelected['squad_type'] }}</span>
            <span class="pr-4 sm:pr-8"><b>Lvl:</b> {{ $monsterSelected['lvl'] }}</span>
            <span class="pr-4 sm:pr-8"><b>Typ:</b> {{ $monsterSelected['type'] }}</span>
        </div>
    @else
        <p class="py-2 text-center text-tb-second">BRAK</p>
    @endif

    <div
        class="odd flex max-h-0 w-full flex-col overflow-hidden transition-all duration-500 peer-checked/arrow:max-h-[1500px]">

        @forelse ($monsterSelected['render'] as $monsterDetal)
            <div class="first flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Nazwa:
                </span>
                <span class="text-md block w-1/2">
                    {{ $monsterDetal['nazwa'] }}
                </span>
            </div>
            <div class="flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Typ:
                </span>
                <span class="text-md flex w-1/2">
                    @foreach ($monsterDetal['typ'] as $typ)
                        <p class="pr-2">{{ !$loop->last ? $typ . ', ' : $typ }}</p>
                    @endforeach
                </span>
            </div>
            <div class="flex pl-2 odd:bg-tb-second/10">
                <span class="block w-1/2 text-sm">
                    Ilość:
                </span>
                <span class="text-md block w-1/2">
                    ({{ $monsterDetal['mnoznik'] }}x)
                    {{ number_format($monsterDetal['ilosc'], 0, '.', ' ') }}
                </span>
            </div>

            @foreach ($monsterDetal['atak'] as $atak)
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
                    {{ number_format($monsterDetal['zycie_all'], 2, '.', ' ') }}
                </span>
            </div>
        @empty
            <span>Brak wybranego przeciwnika</span>
        @endforelse

    </div>
    <button
        class="absolute top-2 right-2 cursor-pointer text-green-500 transition-all duration-500 peer-checked/arrow:opacity-0 sm:right-1 sm:top-0">
        <label for="showHideMonster">
            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 5.25l-7.5 7.5-7.5-7.5m15 6l-7.5 7.5-7.5-7.5" />
            </svg>
        </label>
    </button>
    <button
        class="absolute top-2 right-2 cursor-pointer text-red-500 opacity-0 transition-all duration-500 peer-checked/arrow:opacity-100 sm:right-1 sm:top-0">
        <label for="showHideMonster">
            <svg class="h-10 w-10" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M4.5 12.75l7.5-7.5 7.5 7.5m-15 6l7.5-7.5 7.5 7.5" />
            </svg>
        </label>
    </button>
</div>
