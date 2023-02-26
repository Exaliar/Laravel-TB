<form class="text-tb-second dark:text-tb" action="{{ route('article.store') }}" method="POST"
    enctype="multipart/form-data">
    @csrf
    <div class="group relative z-0 mb-6 w-full">
        <input
            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm focus:border-tb-active focus:outline-none focus:ring-0"
            id="floating_text" name="floating_text" type="text" placeholder=" " required />
        <label
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-tb-active dark:text-gray-400 peer-focus:dark:text-tb-active"
            for="floating_text">
            Tytuł artykułu
        </label>
    </div>
    <div class="group relative z-0 mb-6 w-full">
        <textarea
            class="peer block w-full appearance-none border-0 border-b-2 border-gray-300 bg-transparent py-2.5 px-0 text-sm focus:border-tb-active focus:outline-none focus:ring-0"
            id="floating_textarea" name="floating_textarea" placeholder=" " required rows="6"></textarea>
        <label
            class="absolute top-3 -z-10 origin-[0] -translate-y-6 scale-75 transform text-sm duration-300 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:left-0 peer-focus:-translate-y-6 peer-focus:scale-75 peer-focus:font-medium peer-focus:text-tb-active dark:text-gray-400 peer-focus:dark:text-tb-active"
            for="floating_textarea">
            Treść artykułu
        </label>
    </div>
    <div class="group z-0 mb-6 w-full border-b-2 border-gray-300 hover:border-tb-active">

        <label class="pr-4 font-medium" for="floating_file">Upload file</label>
        <input
            class="block cursor-pointer font-medium file:my-2 file:rounded-full file:border-0 file:bg-tb-second file:py-2 file:px-4 file:text-tb file:hover:bg-tb-second/80 focus:outline-none file:focus:text-tb-active"
            id="floating_file" name="floating_file" type="file">

    </div>

    <x-primary-button class="my-3">
        Zapisz
    </x-primary-button>
</form>
