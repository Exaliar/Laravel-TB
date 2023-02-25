<div>
    {{-- The best athlete wants his opponent at his best. --}}
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
                            {{ $filteredMonster->squad_type }}
                        </td>
                        <td class="py-2 pr-1 first-letter:uppercase">
                            {{ $filteredMonster->type }}
                        </td>
                        <td class="py-2 pr-1">
                            {{ $filteredMonster->lvl }}
                        </td>
                        <td class="py-2 pr-1">
                            <input name="{{ $filteredMonster->id }}" type="hidden">

                            <a class="rounded-sm bg-tb-second/80 py-1 pr-1 text-xs text-tb transition-all hover:bg-tb hover:text-tb-active dark:text-blue-500"
                                href="#">Wybierz</a>
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

    {{-- <tr class="odd:bg-tb-second/10 dark:bg-gray-800">
        <th class="whitespace-nowrap px-1 py-2 font-medium text-tb-second dark:text-white" scope="row">
            Zwykły
        </th>
        <td class="py-2 pr-1">
            Nieumarły
        </td>
        <td class="py-2 pr-1">
            12
        </td>
        <td class="py-2 pr-1">
            <a class="rounded-sm bg-green-600 py-1 pr-1 text-xs text-tb transition-all hover:bg-tb hover:text-tb-active dark:text-blue-500"
                href="#">Wybrany</a>
        </td>
    </tr> --}}

</div>
