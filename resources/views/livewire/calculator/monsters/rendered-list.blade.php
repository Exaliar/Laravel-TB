<div>
    <div class="relative mx-0 flex h-96 w-full flex-col overflow-x-auto overflow-y-scroll">
        <table class="inline-blocktext-left text-left text-sm text-tb-second dark:border-gray-700/20 dark:text-gray-400">
            <thead
                class="sticky top-0 right-0 left-0 bg-tb text-xs uppercase text-tb-second dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th class="px-1 py-2" scope="col">
                        Rodzaj
                    </th>
                    <th class="py-2 pr-1" scope="col">
                        Typ
                    </th>
                    <th class="py-2 pr-1" scope="col">
                        Lvl
                    </th>
                    <th class="py-2 pr-1" scope="col">
                        Akcja
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($renderedSquad as $filteredMonster)
                    <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                        <td class="px-1 py-2 first-letter:uppercase" scope="row">
                            {{ $filteredMonster['squad_type'] }}
                        </td>
                        <td class="py-2 pr-1 first-letter:uppercase">
                            {{ $filteredMonster['type'] }}
                        </td>
                        <td class="py-2 pr-1">
                            {{ $filteredMonster['lvl'] }}
                        </td>
                        <td class="py-2 pr-1">
                            @if ($selected !== $filteredMonster['id'])
                                <button
                                    class="rounded-lg bg-blue-500 px-4 py-2 text-blue-100 duration-300 hover:bg-blue-600"
                                    wire:click="selectFightingSquad('{{ $filteredMonster['id'] }}')">Wybierz</button>
                            @else
                                <button
                                    class="rounded-lg bg-green-700 px-4 py-2 text-green-100 duration-300 hover:bg-green-800">Wybrany</button>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
                        <td class="px-1 py-2 text-center" scope="row" colspan="4">
                            Brak danych
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
