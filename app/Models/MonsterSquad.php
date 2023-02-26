<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MonsterSquad extends Model
{
    use HasFactory, HasUuids;

    protected $filable = [
        'squad_type',
        'lvl',
        'type',
        'first_monster',
        'first_monster_count',
        'second_monster',
        'second_monster_count',
        'third_monster',
        'third_monster_count',
        'fourth_monster',
        'fourth_monster_count',
        'fifth_monster',
        'fifth_monster_count',
        'sixth_monster',
        'sixth_monster_count',
    ];

    // protected $with = [
    //     'firstMonster',
    //     'secondMonster',
    //     'thirdMonster',
    //     'fourthMonster',
    //     'fifthMonster',
    //     'sixthMonster',
    //     'seventhMonster' // test this monster not exist
    // ];

    public function firstMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'first_monster');
    }

    public function secondMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'second_monster');
    }

    public function thirdMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'third_monster');
    }

    public function fourthMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'fourth_monster');
    }

    public function fifthMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'fifth_monster');
    }

    public function sixthMonster()
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'sixth_monster');
    }

    public function seventhMonster()  // test this monster not exist
    {
        return $this->hasOne('\App\Models\Monster', 'id', 'seventh_monster');
    }
}
