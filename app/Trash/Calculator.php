<?php

namespace App\Http\Livewire\Calculator;

use Livewire\Component;

class Calculator extends Component
{

    public $monster = null;
    public $displayMonsterModal = false;
    public $army =[];
    public $displayArmyModal = false;
    public $control = null;
    public $raport = null;


    public function render()
    {
        return view('livewire.calculator.calculator');
    }
}
