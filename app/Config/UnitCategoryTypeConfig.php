<?php

namespace App\Config;

class UnitCategoryTypeConfig
{
    const MELEE_UNIT = 'melee_unit';
    const RANGED_UNIT = 'ranged_unit';
    const MOUNTED_UNIT = 'mounted_unit';
    const FLYING_UNIT = 'flying_unit';
    const SIEGE_ENGINE = 'siege_engine';
    const FORTIFICATION = 'fortification';
    const SCOUT = 'scout';
    const BEAST = 'beast';
    const ELEMENTAL = 'elemental';
    const GIANT = 'giant';
    const DRAGON = 'dragon';
    const HUMAN = 'human';
    // const GUARDSMAN = 'guardsman';
    // const SPECIALIST = 'specialist';
    // const ENGINEER_CORP = 'engineer_corp';

    const TYPES = [
        self::MELEE_UNIT,
        self::RANGED_UNIT,
        self::MOUNTED_UNIT,
        self::FLYING_UNIT,
        self::SIEGE_ENGINE,
        self::FORTIFICATION,
        self::SCOUT,
        self::BEAST,
        self::ELEMENTAL,
        self::GIANT,
        self::DRAGON,
        self::HUMAN,
        // self::GUARDSMAN,
        // self::SPECIALIST,
        // self::ENGINEER_CORP,
    ];
}
