<div>
    <section class="md:10/12 w-full bg-tb text-tb-second dark:bg-tb-second dark:text-tb">

        <x-calculator.section-title>przeciwnicy</x-calculator.section-title>

        <div class="my-2 flex">
            <div class="flex flex-shrink-0 flex-col items-start border-r px-1">
                <x-calculator.title-group-check-box-input title="Lvl's" />

                <div class="flex items-center">
                    <input class="m-0 h-8 w-10 rounded p-0 text-center text-black outline-none" id=""
                        name="" type="text" value="{{ $minLvl }}" maxlength="2" wire:model="minLvl">
                    <span class="mx-1">-</span>
                    <input class="m-0 h-8 w-10 rounded p-0 text-center text-black outline-none" id=""
                        name="" type="text" value="{{ $maxLvl }}" maxlength="2" wire:model="maxLvl">
                </div>
                {{-- <x-calculator.between-lvls-monster first="1" second="55" /> --}}

                <x-calculator.title-group-check-box-input title="Rodzaj" />

                @foreach ($squads as $squad)
                    <div>
                        <input class="h-4 w-4" id="{{ $squad }}" type="checkbox" value="{{ $squad }}"
                            wire:model="squadsSelected">
                        <label class="mx-2 shrink-0 text-xs font-light text-tb-second"
                            for="{{ $squad }}">{{ $squad }}</label>
                    </div>
                @endforeach

                <x-calculator.title-group-check-box-input title="Typ" />

                @foreach ($types as $type)
                    <div>
                        <input class="h-4 w-4" id="{{ $type }}" type="checkbox" value="{{ $type }}"
                            wire:model="typesSelected">
                        <label class="mx-2 shrink-0 text-xs font-light text-tb-second"
                            for="{{ $type }}">{{ $type }}</label>
                    </div>
                @endforeach

            </div>

            {{-- <div class="mx-2 h-10 w-full bg-tb-red"></div> --}}

            {{--
                Show minLvl checked: {{ var_export($minLvl) }}
                <br>
                Show maxLvl checked: {{ var_export($maxLvl) }}
                <br>
                Show squadsSelected checked: {{ var_export($squadsSelected) }}
                <br>
                Show typesSelected checked: {{ var_export($typesSelected) }}
                --}}
            <div class="w-full">
                <div class="" wire:loading wire:target="squadsSelected">LOADING....</div>
                <livewire:calculator.menu-monster-filter />

            </div>
        </div>

</div>


</section>
</div>
