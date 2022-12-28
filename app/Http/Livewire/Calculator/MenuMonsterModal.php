<?php

namespace App\Http\Livewire\Calculator;

use Livewire\Component;

class MenuMonsterModal extends Component
{
    public $visibility = true;
    public $monster = false;
    public $monsterId = false;

    public function mount()
    {
        $this->monster = ['kind' => 'normal', 'lvl' => '22', 'type' => 'inferno'];
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

    public function hideModal()
    {
        $this->visibility = false;
    }

    public function changeMonster($monsterId)
    {
        $this->monsterId = $monsterId;
    }
}
