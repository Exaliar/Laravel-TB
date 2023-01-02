<?php

namespace App\Config;

class SquadTypesConfig
{
    const NORMAL = 'normal';
    const RARE = 'rare';
    const HEROIC = 'heroic';
    const CITADEL = 'citadel';
    const EPIC = 'epic';
    const OTHER = 'other';

    const TYPES = [
        self::NORMAL,
        self::RARE,
        self::HEROIC,
        self::CITADEL,
        self::EPIC,
        self::OTHER
    ];

    public static function PeerTrigerTailwind()
    {
        $class = [];
        foreach (self::TYPES as $type) {
            $class[] = [
                'type' => $type,
                'hidden' => 'peer/monster-menu-' . $type . ' hidden',
                'color' => 'peer-checked/monster-menu-' . $type . ':bg-tb-active h-8 bg-tb px-4 py-2 text-center text-tb-second first-letter:uppercase',
                //peer-checked/monster-menu-{{ $type['type'] }}:text-tb
            ];
        }
        return $class;
    }
}
