<div>
    @props(['colorType' => 1, 'text'])

    @php
        $colors = [
            1 => 'bg-lvl-1 text-black',
            2 => 'bg-lvl-2',
            3 => 'bg-lvl-3',
            4 => 'bg-lvl-4',
            5 => 'bg-lvl-5',
            6 => 'bg-lvl-6',
            7 => 'bg-lvl-7 text-black',
        ];
    @endphp

    <span
        {{ $attributes->merge(['class' => 'w-6 h-6 block text-center leading-6 rounded-sm m-1 ' . $colors[$colorType]]) }}>
        {{ $text }}
    </span>
</div>
