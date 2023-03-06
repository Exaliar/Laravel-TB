<div>
    <div class="my-2 flex">
        <div class="flex flex-shrink-0 flex-col items-start border-r px-1">
            <x-calculator.title-group-check-box-input title="Lvl's">
                <livewire:calculator.monsters.lvl-filter />
            </x-calculator.title-group-check-box-input>

            <x-calculator.title-group-check-box-input title="Rodzaj">
                <livewire:calculator.monsters.squad-check-filter />
            </x-calculator.title-group-check-box-input>

            <x-calculator.title-group-check-box-input title="Typ">
                <livewire:calculator.monsters.type-check-filter />
            </x-calculator.title-group-check-box-input>

        </div>
        <div class="w-full">
            <livewire:calculator.monsters.rendered-list />
        </div>
    </div>
</div>
