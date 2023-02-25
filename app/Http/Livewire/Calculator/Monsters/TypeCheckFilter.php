<?php

namespace App\Http\Livewire\Calculator\Monsters;

use App\Config\MonstersTypeConfig;
use Livewire\Component;

class TypeCheckFilter extends Component
{

    public $types = [];

    public function mount()
    {
        $this->types = MonstersTypeConfig::TYPES;
    }

    public function render()
    {
        return view('livewire.calculator.monsters.type-check-filter');
    }
}
