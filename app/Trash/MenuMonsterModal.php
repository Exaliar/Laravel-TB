<?php

namespace App\Http\Livewire\Calculator;

use App\Config\MonstersSquadTypeConfig;
use Livewire\Component;

class MenuMonsterModal extends Component
{
    public $visibility = false;
    public $monster = false;
    public $monsterId = false;
    public $squadTypes;

    public function mount()
    {
        $this->monster = ['type' => 'normal', 'lvl' => 22, 'kind' => 'inferno'];
        $this->squadTypes = MonstersSquadTypeConfig::TYPES;
    }

    public function render()
    {
        return view('livewire.calculator.menu-monster-modal');
    }

    public function toggleModal(){
        if ($this->visibility !== true) {
            $this->visibility = true;
        } else {
            $this->visibility = false;
        }
    }

    public function hideMonsterMenuModal()
    {
        $this->visibility = false;
    }

    public function changeMonster($type, $i, $j, $kind)
    {
        //docelowo emitowac dane do innego komponentu odpowiedzialnego za przeliczanie wartosci
        $this->monster['type'] = $type;
        $this->monster['lvl'] =  $i * 5 + 1 + $j;
        $this->monster['kind'] =  $kind;
        // dd($this->monster);
        $this->visibility = false;
    }
}
