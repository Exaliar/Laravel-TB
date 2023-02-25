<div>
    {{-- Do your work, then step back. --}}
    <div class="flex items-center">
        <input class="m-0 h-8 w-10 rounded p-0 text-center text-black outline-none" id="" name=""
            type="text" value="{{ $minLvl }}" maxlength="2" wire:model="minLvl">
        <span class="mx-1">-</span>
        <input class="m-0 h-8 w-10 rounded p-0 text-center text-black outline-none" id="" name=""
            type="text" value="{{ $maxLvl }}" maxlength="2" wire:model="maxLvl">
    </div>
</div>
