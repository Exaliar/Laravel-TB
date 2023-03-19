<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Army extends Model
{
    use HasFactory, SoftDeletes, HasUuids;

    protected $filable = [
        'lvl',
        'name',
        'first_type',
        'second_type',
        'third_type',
        'strength',
        'health',
        'first_bonus',
        'first_bonus_who',
        'second_bonus',
        'second_bonus_who',
        'third_bonus',
        'third_bonus_who',
        'graphics'
    ];

    protected $visible = [
        'id',
        'lvl',
        'name',
        'menu_type',
        'first_type',
        'second_type',
        'third_type',
        'strength',
        'health',
        'first_bonus',
        'first_bonus_who',
        'second_bonus',
        'second_bonus_who',
        'third_bonus',
        'third_bonus_who',
        'graphics'
    ];
}
