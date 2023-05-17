<?php

namespace App\Http\Livewire\Calculator\Monsters;

use Livewire\Component;

class LvlFilter extends Component
{
    public $minLvl;
    public $maxLvl;

    protected $rules = [
        'minLvl' => 'integer|between:1,55',
        'maxLvl' => 'integer|between:1,55'
    ];

    public function mount()
    {
        $this->minLvl = "1";
        $this->maxLvl = "55";
    }

    public function render()
    {
        return view('livewire.calculator.monsters.lvl-filter');
    }

    public function updatedMinLvl($value)
    {
        $this->validate();

        if ($value > $this->maxLvl) {
            $this->minLvl = $this->maxLvl;
            $this->maxLvl = $value;
        }
        $this->emit('minMaxLvl', $this->minLvl, $this->maxLvl);
    }

    public function updatedMaxLvl($value)
    {
        $this->validate();

        if ($value < $this->minLvl) {
            $this->maxLvl = $this->minLvl;
            $this->minLvl = $value;
        }
        $this->emit('minMaxLvl', $this->minLvl, $this->maxLvl);
    }
}
