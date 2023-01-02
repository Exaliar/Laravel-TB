<?php

namespace App\Http\Livewire\Calculator;

use App\Config\SquadTypesConfig;
use Livewire\Component;

class MenuMonsterModal extends Component
{
    public $visibility = true;
    public $monster = false;
    public $monsterId = false;
    public $squadTypes;

    public function mount()
    {
        $this->monster = ['kind' => 'normal', 'lvl' => '22', 'type' => 'inferno'];
        $this->squadTypes = SquadTypesConfig::TYPES;
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

    public function changeMonster($monsterId)
    {
        //docelowo emitowac dane do innego komponentu odpowiedzialnego za przeliczanie wartosci
        $this->monsterId = $monsterId;
    }
}
