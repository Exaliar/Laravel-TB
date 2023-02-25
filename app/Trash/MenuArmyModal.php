<?php

namespace App\Http\Livewire\Calculator;

use Livewire\Component;

class MenuArmyModal extends Component
{
    public $visibility = false;

    public function render()
    {
        return view('livewire.calculator.menu-army-modal');
    }

    public function toggleModal(){
        if ($this->visibility !== true) {
            $this->visibility = true;
        } else {
            $this->visibility = false;
        }
        // $this->render();
    }

    public function hideModal()
    {
        $this->visibility = false;
    }
}
