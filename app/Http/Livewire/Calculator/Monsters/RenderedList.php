<?php

namespace App\Http\Livewire\Calculator\Monsters;

use App\Models\MonsterSquad;
use Livewire\Component;

class RenderedList extends Component
{
    public function render()
    {
        return view('livewire.calculator.monsters.rendered-list');
    }
    public $renderedSquad = [];

    protected $listeners = ['filterSquadMonster'];

    public function mount()
    {
        $this->renderedSquad = MonsterSquad::without([
            'firstMonster',
            'secondMonster',
            'thirdMonster',
            'fourthMonster',
            'fifthMonster',
            'sixthMonster',
        ])->whereBetween('lvl', [1, 1])->whereIn('squad_type',['normal'])->whereIn('type', ['elf'])->orderBy('lvl')->get();
    }

    public function filterSquadMonster(array $squad = ['normal'], array $type = ['elf'],$min = 1,$max = 1)
    {
        $this->renderedSquad = MonsterSquad::without([
            'firstMonster',
            'secondMonster',
            'thirdMonster',
            'fourthMonster',
            'fifthMonster',
            'sixthMonster',
        ])->whereBetween('lvl', [$min, $max])->whereIn('squad_type', $squad)->whereIn('type', $type)->orderBy('lvl')->get();
        // dd($this->renderedSquad);
    }
}
