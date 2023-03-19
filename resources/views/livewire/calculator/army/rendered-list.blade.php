<div>
    <div class="relative mx-0 flex h-96 w-full flex-col overflow-x-auto overflow-y-scroll">

        <table class="inline-blocktext-left text-left text-sm text-tb-second dark:border-gray-700/20 dark:text-gray-400">
            <thead
                class="sticky top-0 right-0 left-0 bg-tb text-xs uppercase text-tb-second dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-1 py-2" scope="col">
                        Nazwa
                    </th>
                    <th class="py-2 pr-1" scope="col">
                        Lvl
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sordedSelectedArmyies as $typeArmyGroup)
                    @foreach ($typeArmyGroup as $name => $lvlGroup)
                        <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                            <td class="px-1 py-2 first-letter:uppercase" scope="row">
                                {{ $name }}
                            </td>
                            <td class="flex flex-row flex-wrap py-2 pr-1">
                                @foreach ($lvlGroup as $lvl => $id)
                                    <x-buttons.lvl-army-button wire:click="$emit('addArmyUnit', '{{ $id['id'] }}')"
                                        colorType="{{ $lvl }}" text="{{ $lvl }}" />
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                        <td class="px-1 py-2 text-center" scope="row" colspan="4">
                            Brak danych
                        </td>
                    </tr>
                @endforelse


                {{-- @forelse ($typesArmySelected as $filteredArmy)
                <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                    <td class="px-1 py-2 first-letter:uppercase" scope="row">
                        {{ $filteredArmy['name'] }}
                    </td>
                    <td class="py-2 pr-1">
                        {{ $filteredArmy['lvl'] }}
                    </td> --}}
                {{-- <td class="py-2 pr-1">
                        @if ($selected !== $filteredMonster['id'])
                            <div>
                                <input class="hidden" id="{{ $filteredMonster['id'] }}" type="radio"
                                    value="{{ $filteredMonster['id'] }}" wire:model="selected">
                                <label
                                    class="cursor-pointer rounded-sm bg-blue-500 px-4 py-1 text-blue-100 duration-300 hover:bg-blue-600"
                                    for="{{ $filteredMonster['id'] }}">Wybierz</label>
                            </div>
                            <button
                                class="rounded-lg bg-blue-500 px-4 py-2 text-blue-100 duration-300 hover:bg-blue-600"
                                wire:click="selectFightingSquad('{{ $filteredMonster['id'] }}')">Wybierz</button>
                        @else
                            <div>
                                <input class="hidden" id="{{ $filteredMonster['id'] }}" type="radio"
                                    value="{{ $filteredMonster['id'] }}" wire:model="selected">
                                <label class="rounded-sm bg-green-700 px-4 py-1 text-green-100 duration-300"
                                    for="{{ $filteredMonster['id'] }}">Wybrany</label>
                            </div>
                            <button
                                class="rounded-lg bg-green-700 px-4 py-2 text-green-100 duration-300 hover:bg-green-800">Wybrany</button>
                        @endif
                    </td> --}}
                {{-- </tr>
            @empty
                <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                    <td class="px-1 py-2 text-center" scope="row" colspan="4">
                        Brak danych
                    </td>
                </tr>
            @endforelse --}}
            </tbody>
        </table>

    </div>
</div>
