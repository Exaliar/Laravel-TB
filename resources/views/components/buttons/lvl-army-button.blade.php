<div>
    @props(['colorType' => 1, 'text'])

    @php
        $colors = [
            1 => 'bg-lvl-1 hover:bg-lvl-1/70 text-black',
            2 => 'bg-lvl-2 hover:bg-lvl-2/70',
            3 => 'bg-lvl-3 hover:bg-lvl-3/70',
            4 => 'bg-lvl-4 hover:bg-lvl-4/70',
            5 => 'bg-lvl-5 hover:bg-lvl-5/70',
            6 => 'bg-lvl-6 hover:bg-lvl-6/70',
            7 => 'bg-lvl-7 hover:bg-lvl-7/70 text-black',
        ];
    @endphp

    <button {{ $attributes->merge(['class' => 'w-6 h-6 rounded-sm m-1 ' . $colors[$colorType]]) }}>
        {{ $text }}
    </button>
</div>
