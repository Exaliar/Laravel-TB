<?php

namespace App\Http\Livewire\Calculator\Monsters;

use Livewire\Component;

class LvlFilter extends Component
{
    public $minLvl;
    public $maxLvl;

    public function mount()
    {
        $this->minLvl = "1";
        $this->maxLvl = "55";
    }

    public function render()
    {
        return view('livewire.calculator.monsters.lvl-filter');
    }

    public function updatingMinLvl($value)
    {
        if ($value > $this->maxLvl) {
            $this->minLvl = $this->maxLvl;
            $this->maxLvl = $value;
        }
        $this->minLvl = $value;
    }
}
