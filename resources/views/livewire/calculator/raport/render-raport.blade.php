<div class="h-auto">
    @forelse ($raports as $raport)
        {{-- {{ dd($raports) }} --}}
        <section class="flex h-auto flex-col border-b text-tb-second odd:bg-tb-second/10">
            <div class="flex flex-row">
                <div class="my-auto w-5 text-center">
                    <span>{{ $loop->iteration }}.</span>
                </div>
                <div class="relative h-full w-36 sm:w-52">
                    <div class="justify-left flex flex-row items-center space-x-1 text-sm">
                        <x-buttons.lvl-army-info colorType="{{ $raport['army']['lvl'] }}"
                            text="{{ $raport['army']['lvl'] }}" />
                        <span>{{ $raport['army']['name'] }}</span>
                    </div>
                    @if ($raport['action'] === true)
                        <div class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-green-800">
                            <span
                                class="absolute top-0 right-0 bottom-0 px-1">{{ number_format($raport['army']['count_unit'], 0, '.', ' ') }}</span>
                        </div>
                    @else
                        <div
                            class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-green-800">
                            <span
                                class="absolute top-0 right-0 bottom-0 px-1">{{ number_format($raport['army']['count_unit'], 0, '.', ' ') }}</span>
                        </div>
                        <div class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-red-800">
                            <span class="absolute top-0 right-0 bottom-0 px-1">-
                                {{ number_format($raport['army']['lost_trops'], 0, '.', ' ') }}</span>
                        </div>
                    @endif
                    @if ($raport['army']['death'] === true)
                        <div class="absolute inset-0 m-auto flex items-center justify-center bg-tb-second/40">
                            <x-calculator.skull />
                        </div>
                    @endif
                </div>
                <div class="mx-1 my-auto h-10 w-10">
                    @if ($raport['action'])
                        <x-calculator.raport-arrow-right />
                    @else
                        <x-calculator.raport-arrow-left />
                    @endif
                </div>
                <div class="relative h-full w-36 sm:w-52">
                    <div class="justify-left flex flex-row items-center space-x-1 text-sm">
                        <x-buttons.lvl-army-info colorType="{{ $raport['monster']['lvl'] }}"
                            text="{{ $raport['monster']['lvl'] }}" />
                        <span>{{ $raport['monster']['name'] }}</span>
                    </div>
                    @if ($raport['action'] === false)
                        <div
                            class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-green-800">
                            <span
                                class="absolute top-0 right-0 bottom-0 px-1">{{ number_format($raport['monster']['count_unit'], 0, '.', ' ') }}</span>
                        </div>
                    @else
                        <div
                            class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-green-800">
                            <span
                                class="absolute top-0 right-0 bottom-0 px-1">{{ number_format($raport['monster']['count_unit'], 0, '.', ' ') }}</span>
                        </div>
                        <div class="from-40% via-50% to-60% relative h-5 bg-gradient-to-r from-transparent to-red-800">
                            <span class="absolute top-0 right-0 bottom-0 px-1">-
                                {{ number_format($raport['monster']['lost_trops'], 0, '.', ' ') }}</span>
                        </div>
                    @endif
                    @if ($raport['monster']['death'] === true)
                        <div class="absolute inset-0 m-auto flex items-center justify-center bg-tb-second/40">
                            <x-calculator.skull />
                        </div>
                    @endif
                </div>
            </div>
            <div class="bg-tb-second text-tb">
                @if ($raport['action'])
                    {{ $raport['army']['name'] . ' zadał ' . number_format($raport['monster']['damage'], 0, '.', ' ') . ' obrażeń jednostce ' . $raport['monster']['name'] }}
                @else
                    {{ $raport['monster']['name'] . ' zadał ' . number_format($raport['army']['damage'], 0, '.', ' ') . ' obrażeń jednostce ' . $raport['army']['name'] }}
                @endif
            </div>
        </section>
    @empty
        <div class="w-full bg-tb-second text-center">
            <span class="text-tb-red">Proszę wybrać jednostki atakujące i oddział atakowany</span>
        </div>
    @endforelse
</div>
