<?php

namespace App\Config;

class MenuTypesConfig
{
    const GUARDSMAN = 'guardsman';
    const SPECIALIST = 'specialist';
    const ENGINEER_CORP = 'engineer_corp';
    // const SIEGE_ENGINE = 'siege_engine';
    const DRAGON = 'dragon';
    const ELEMENTAL = 'elemental';
    const GIANT = 'giant';
    const BEAST = 'beast';
    const AUTHORITY = 'authority';

    const TYPES = [
        self::GUARDSMAN,
        self::SPECIALIST,
        self::ENGINEER_CORP,
        self::DRAGON,
        self::ELEMENTAL,
        self::GIANT,
        self::BEAST,
        // self::SIEGE_ENGINE,
        self::AUTHORITY
    ];
}
