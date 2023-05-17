<div>
    <section class="flex flex-col text-tb-second">

        @if (!empty($blads))
            @foreach ($blads as $blad)
                <div class="w-ful text-center text-red-500">{{ $blad }}</div>
            @endforeach
        @endif

        <div class="flex w-full flex-row py-2 pr-4">
            <span class="block w-1/3 px-4">First atak:</span>
            <div class="inline-flex select-none divide-x rounded-lg border border-gray-200 bg-tb-second text-gray-900">
                <input class="peer hidden" id="" name="" type="checkbox" wire:model="firstAtak">
                <label
                    class="w-20 cursor-pointer rounded-lg bg-tb-second py-2 px-2 text-center first:rounded-l-lg last:rounded-r-lg peer-checked:bg-tb peer-checked:text-tb-second"
                    for="firstAtak" wire:click="firstAtakPlayer">Gracz</label>
                <label
                    class="w-20 cursor-pointer rounded-lg bg-tb py-2 px-2 text-center text-tb-second first:rounded-l-lg last:rounded-r-lg peer-checked:bg-tb-second peer-checked:text-tb"
                    for="firstAtak" wire:click="firstAtakMonster">Monster</label>
            </div>
        </div>

        <div class="flex w-full flex-row pb-2 pr-4">
            <span class="block w-1/3 px-4">Bonus ataku:</span>
            <div class="inline-flex select-none rounded-lg border border-gray-200 bg-tb-second text-gray-900">
                <button
                    class="border-r border-tb bg-tb-second py-1.5 px-4 transition-all first:rounded-l-lg last:rounded-r-lg hover:bg-tb/30 active:bg-gray-200"
                    wire:click="decreaseBonusAP">-</button>
                <input
                    class="m-0 w-20 appearance-none border-0 bg-tb-second p-0 py-1.5 px-4 text-center first:rounded-l-lg last:rounded-r-lg hover:bg-gray-100 focus:border-0 active:bg-gray-200"
                    type="text" wire:model="bonusAP">
                <button
                    class="border-l border-tb bg-tb-second py-1.5 px-4 transition-all first:rounded-l-lg last:rounded-r-lg hover:bg-tb/30 active:bg-gray-200"
                    wire:click="increaseBonusAP">+</button>
            </div>
        </div>

        <div class="flex w-full flex-row pb-2 pr-4">
            <span class="block w-1/3 px-4">Bonus życia:</span>
            <div class="inline-flex select-none rounded-lg border border-gray-200 bg-tb-second text-gray-900">
                <button
                    class="border-r border-tb bg-tb-second py-1.5 px-4 transition-all first:rounded-l-lg last:rounded-r-lg hover:bg-tb/30 active:bg-gray-200"
                    wire:click="decreaseBonusHP">-</button>
                <input
                    class="m-0 w-20 appearance-none border-0 bg-tb-second p-0 py-1.5 px-4 text-center first:rounded-l-lg last:rounded-r-lg hover:bg-gray-100 focus:border-0 active:bg-gray-200"
                    type="text" wire:model="bonusHP">
                <button
                    class="border-l border-tb bg-tb-second py-1.5 px-4 transition-all first:rounded-l-lg last:rounded-r-lg hover:bg-tb/30 active:bg-gray-200"
                    wire:click="increaseBonusHP">+</button>
            </div>
        </div>

        <div class="flex w-full flex-row pb-2 pr-4">
            <span class="block w-1/3 px-4">Akcja:</span>
            <button
                class="mr-2 rounded-lg border-r border-tb bg-blue-500 py-1.5 px-4 text-tb-second transition-all hover:bg-blue-600 active:bg-blue-600"
                wire:click="fight">Oblicz</button>
            {{-- <button
                class="rounded-lg border-l border-tb bg-green-500 py-1.5 px-4 text-tb-second transition-all hover:bg-green-600 active:bg-green-600"
                wire:click="save">Zapisz</button> --}}
        </div>
    </section>
</div>
