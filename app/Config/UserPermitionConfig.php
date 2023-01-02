<?php

namespace App\Config;

class UserPermitionConfig
{
    const USER = 'user';
    const USER_PREMIUM = 'user_boosted';
    const ADMIN = 'admin';
    const SUPER_ADMIN = 'super_admin';

    const ACCES = [
        self::USER,
        self::USER_PREMIUM,
        self::ADMIN,
        self::SUPER_ADMIN,
    ];
}
