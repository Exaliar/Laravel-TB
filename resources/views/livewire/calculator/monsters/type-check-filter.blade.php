<div>
    @foreach ($types as $type)
        <div>
            <input class="h-4 w-4" id="{{ $type }}" type="checkbox" value="{{ $type }}"
                wire:model="typesSelected">
            <label class="mx-2 shrink-0 cursor-pointer text-xs font-light text-tb-second"
                for="{{ $type }}">{{ $type }}</label>
        </div>
    @endforeach
</div>
