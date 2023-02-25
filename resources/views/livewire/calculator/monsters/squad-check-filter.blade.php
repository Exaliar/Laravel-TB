<div>
    {{-- The whole world belongs to you. --}}
    @foreach ($squads as $squad)
        <div>
            <input class="h-4 w-4" id="{{ $squad }}" type="checkbox" value="{{ $squad }}"
                wire:model="squadsSelected">
            <label class="mx-2 shrink-0 text-xs font-light text-tb-second"
                for="{{ $squad }}">{{ $squad }}</label>
        </div>
    @endforeach
</div>
