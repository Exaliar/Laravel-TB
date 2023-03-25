<?php

namespace App\Http\Livewire\Calculator\User;

use Livewire\Component;

class UserPanel extends Component
{
    public $firstAtak = true;
    public $bonusAP = 25;
    public $bonusHP = 25;

    public function render()
    {
        return view('livewire.calculator.user.user-panel');
    }

    public function updatedBonusAP($val)
    {
        $this->bonusAP = round(abs(floatval($val)), 1);
    }

    public function updatedBonusHP($val)
    {
        $this->bonusHP = round(abs(floatval($val)), 1);
    }

    public function increaseBonusAP()
    {
        $this->emit('massIncreaseBonusAP', $this->bonusAP); // event do render army z bonusAP
    }

    public function decreaseBonusAP()
    {
        $this->emit('massDecreaseBonusAP', $this->bonusAP); // event do render army z bonusAP
    }

    public function increaseBonusHP()
    {
        $this->emit('massIncreaseBonusHP', $this->bonusHP); // event do render army z bonusHP
    }

    public function decreaseBonusHP()
    {
        $this->emit('massDecreaseBonusHP', $this->bonusHP); // event do render army z bonusHP
    }

    public function save()
    {
        $this->emit('saveUnit');
    }
}
