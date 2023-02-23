<div class="bg-black-600 absolute top-0 right-0 left-0 z-50 h-screen" wire:click="hideModal">
    <nav class="@if ($visibility) visible @else invisible @endif border border-sky-300">
        <legend class="py-2 text-center">Test Army Menu</legend>
        <section class="grid h-[349px] grid-cols-12 grid-rows-8 gap-1">
            <input class="peer/guard hidden" id="guard" name="army-menu" type="radio" checked>
            <label
                class="peer-checked/guard:bg-tb-active peer-checked/guard:text-black col-start-1 col-end-4 h-10 cursor-pointer rounded-md border border-tb-second p-2 text-center text-sm text-tb-second transition-colors hover:bg-tb-active/20 sm:text-base"
                for="guard">Gwardzista
            </label>

            <input class="peer/spec hidden" id="spec" name="army-menu" type="radio">
            <label
                class="peer-checked/spec:bg-tb-active peer-checked/spec:text-black col-start-1 col-end-4 h-10 cursor-pointer rounded-md border border-tb-second p-2 text-center text-sm text-tb-second transition-colors hover:bg-tb-active/20 sm:text-base"
                for="spec">Specjalista
            </label>

            <div
                class="peer-checked/guard:block col-start-4 col-end-13 row-start-1 row-end-[-1] hidden overflow-scroll border border-tb-red">
                @for ($i = 0; $i < 10; $i++)
                    <div class="grid grid-flow-row grid-cols-10 gap-1 border-b border-tb-second p-2">
                        <p class="col-start-1 col-end-11 text-center leading-10 text-tb-second sm:col-end-6">Jezdziec
                            Ognistego Robaka
                        </p>

                        <a class="col-span-2 m-auto h-10 w-10 rounded-full border border-tb-active text-center leading-10 transition-all hover:border-4 hover:border-[#c0c0c0] hover:leading-9 sm:col-start-6 sm:col-end-7"
                            href="">I</a>

                        <a class="col-span-2 m-auto h-10 w-10 rounded-full border border-tb-active text-center leading-10 sm:col-start-7 sm:col-end-8"
                            href="">II</a>

                        <a class="col-span-2 m-auto h-10 w-10 rounded-full border border-tb-active text-center leading-10 sm:col-start-8 sm:col-end-9"
                            href="">III</a>

                        <a class="col-span-2 m-auto h-10 w-10 rounded-full border border-tb-active text-center leading-10 sm:col-start-9 sm:col-end-10"
                            href="">IV</a>

                        <a class="col-span-2 m-auto h-10 w-10 rounded-full border border-tb-active text-center leading-10 sm:col-start-10 sm:col-end-11"
                            href="">V</a>

                    </div>
                @endfor
            </div>

            <div
                class="peer-checked/spec:block col-start-4 col-end-13 row-start-1 row-end-[-1] hidden overflow-scroll border border-tb-red">
                Treść specjalisty
            </div>
        </section>
    </nav>
</div>
