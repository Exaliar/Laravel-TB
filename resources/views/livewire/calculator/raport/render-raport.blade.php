<div class="h-[1000px]">
    {{ $dataRender }}
    <section class="flex h-auto flex-row border-b text-tb-second odd:bg-tb-second/10">
        <div class="my-auto h-full w-5 text-center">1.</div>
        <div class="flex h-full w-5/12 flex-row border-l">
            <div class="ml-1 h-full w-5/6 text-left text-sm">Jezdziec potepionego robaka</div>
            <div>
                <div
                    class="from-10% via-50% h-1/2 bg-gradient-to-r from-transparent via-green-800 to-green-800 pr-1 text-right text-sm text-tb-second">
                    1234
                </div>
                <div
                    class="from-10% via-30% h-1/2 bg-gradient-to-r from-transparent via-red-800 to-red-800 pr-1 text-right text-sm text-tb-second">
                    -1526234
                </div>
            </div>
        </div>
        <div class="mx-1 my-auto h-10 w-10">
            <x-calculator.raport-arrow-left />
        </div>
        <div class="flex h-full w-5/12 flex-row">
            <div class="h-full w-5/6 text-left text-sm">Jezdziec potepionego robaka</div>
            <div class="">
                <div class="h-1/2 bg-gradient-to-r from-transparent to-transparent">
                </div>
                <div
                    class="h-1/2 bg-gradient-to-r from-transparent to-green-800 pr-1 text-right text-sm text-tb-second">
                    1234
                </div>
                {{-- <div class="h-1/2 bg-gradient-to-r from-transparent to-red-800 pr-1 text-right text-sm text-tb-second">
                    -1234
                </div> --}}
            </div>
        </div>
    </section>
</div>
