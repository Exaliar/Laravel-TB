<?php

namespace App\Http\Livewire\Calculator\Monsters;

use App\Config\MonstersSquadTypeConfig;
use App\Config\MonstersTypeConfig;
use App\Models\MonsterSquad;
use Livewire\Component;

class RenderedList extends Component
{

    public $minLvl = '1';
    public $maxLvl = '55';
    // public $squadsSelected = [];
    // public $typesSelected = [];
    public $squadsSelected = [MonstersSquadTypeConfig::NORMAL];
    public $typesSelected = [MonstersTypeConfig::UNDEAD];
    public $renderedSquad = [];
    public $selected = null;

    protected $rules = [
        'selected' => 'nullable|uuid'
    ];

    protected $listeners = [
        'minMaxLvl',
        'squadsSelected',
        'typesSelected',
        'filterSquadMonster',
    ];

    public function mount()
    {
        $this->filterSquadMonster();
    }

    public function render()
    {
        return view('livewire.calculator.monsters.rendered-list');
    }

    public function minMaxLvl($minLvl, $maxLvl)
    {
        $this->minLvl = $minLvl;
        $this->maxLvl = $maxLvl;
        $this->filterSquadMonster();
    }

    public function squadsSelected($value)
    {
        $this->squadsSelected = $value;
        $this->filterSquadMonster();
    }

    public function typesSelected($value)
    {
        $this->typesSelected = $value;
        $this->filterSquadMonster();
    }

    public function selectFightingSquad($selected)
    {
        $this->selected = $selected;
        $this->validate();
        //event odpalajacy pozyskanie modelu wybranej jednostki
    }

    private function filterSquadMonster()
    {
        $this->renderedSquad = MonsterSquad::select('lvl', 'squad_type', 'type', 'id')
        ->whereBetween('lvl', [$this->minLvl, $this->maxLvl])
        ->whereIn('squad_type', $this->squadsSelected)
        ->whereIn('type', $this->typesSelected)
        ->orderBy('lvl')
        ->get()
        ->toArray();
    }
}
