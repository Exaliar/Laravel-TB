<?php

namespace App\Http\Livewire\Calculator\Monsters;

use App\Config\MonstersSquadTypeConfig;
use Livewire\Component;

class SquadCheckFilter extends Component
{

    public $squads = [];
    public $squadsSelected = [];

    public function mount()
    {
        $this->squads = MonstersSquadTypeConfig::TYPES;
    }

    public function render()
    {
        return view('livewire.calculator.monsters.squad-check-filter');
    }
}
