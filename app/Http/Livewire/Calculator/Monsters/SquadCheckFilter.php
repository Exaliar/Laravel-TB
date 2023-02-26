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

    public function updatedSquadsSelected()
    {
        $this->validateRecivedData(MonstersSquadTypeConfig::TYPES, $this->squadsSelected);
        $this->emit('squadsSelected', $this->squadsSelected);
    }

    public function render()
    {
        return view('livewire.calculator.monsters.squad-check-filter');
    }

    private function validateRecivedData (array $stack, array $serching)
    {
        foreach ($serching as $value) {
            if(!in_array($value, $stack)){
                abort(404);
            }
        }
    }
}
