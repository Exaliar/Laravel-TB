<?php

namespace App\Http\Livewire\Calculator;

use App\Config\MonstersSquadTypeConfig;
use App\Config\MonstersTypeConfig;
use App\Models\MonsterSquad;
use Livewire\Component;

class MenuMonster extends Component
{
    // public $squadsSelected = MonstersSquadTypeConfig::TYPES;
    public $squadsSelected = ['normal'];
    // public $typesSelected = MonstersTypeConfig::TYPES;
    public $typesSelected = ['elf'];
    public $minLvl = "1";
    public $maxLvl = "55";

    public function mount()
    {
        $this->emit('filterSquadMonster',
        $this->squadsSelected,
        $this->typesSelected,
        $this->minLvl,
        $this->maxLvl
    );
    }

    public function render()
    {
        $this->validateRecivedData(MonstersSquadTypeConfig::TYPES, $this->squadsSelected);
        $this->validateRecivedData(MonstersTypeConfig::TYPES, $this->typesSelected);
        $this->emit('filterSquadMonster',
            $this->squadsSelected,
            $this->typesSelected,
            $this->minLvl,
            $this->maxLvl
        );

        return view('livewire.calculator.menu-monster', [
            'squads' => MonstersSquadTypeConfig::TYPES,
            'types'  => MonstersTypeConfig::TYPES
        ]);
    }

    public function updatedMinLvl($val)
    {
        if ($val > $this->maxLvl) {
            $this->minLvl = $this->maxLvl;
            $this->maxLvl = $val;
        }
        $this->minLvl = $val;
    }

    public function updateMaxLvl($val)
    {
        $this->maxLvl = $val;
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
