<?php

namespace App\Http\Livewire\Calculator\ArmySelected;

use App\Models\Army;
use Livewire\Component;

class RenderedArmy extends Component
{
    // public $armySelected = [];
    public $armySelected;

    protected $listeners = ['addArmyUnit'];

    public function mount()
    {
        $this->armySelected = collect();
        $this->addArmyUnit(Army::first());
    }

    public function render()
    {
        return view('livewire.calculator.army-selected.rendered-army');
    }

    public function addArmyUnit(Army $id)
    {

        $this->armySelected->push([
            'ilosc' => 1,
            'id' => $id->id,
            'bonusAP' => 0,
            'bonusHP' => 0,
            'render' => $this->prepreData($id)->toArray()
        ]);
        // $this->armySelected->dump();
        // array_push($this->armySelected, $id);
        // $test = $this->prepreData($id);
        // dump($this->armySelected);
    }

    private function prepreData($relacja, $ilosc = 1, $multiple = 1, $bonusAP = 0, $bonusHP = 0)
    {
        return collect([
            'nazwa' => $relacja->name,
            'lvl' => $relacja->lvl,
            'typ' => [
                $relacja->first_type,
                $relacja->second_type,
                $relacja->third_type
            ],
            'mnoznik' => $multiple,
            'ilosc' => $ilosc,
            'atak' => [
                [
                    'nazwa' => 'Podstawa',
                    'bonus' => null,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $bonusAP))
                ],
                [
                    // ilość jednostek * ((siła / 100) * (100 + bonus + bonusGracza)) wzor obliczen
                    'nazwa' => $relacja->first_bonus_who,
                    'bonus' => $relacja->first_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->first_bonus + $bonusAP))
                ],
                [
                    'nazwa' => $relacja->second_bonus_who,
                    'bonus' => $relacja->second_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->second_bonus + $bonusAP))
                ],
                [
                    'nazwa' => $relacja->third_bonus_who,
                    'bonus' => $relacja->third_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->third_bonus + $bonusAP))
                ]
            ],
            'zycie' => $ilosc * (($relacja->health / 100) * (100 + $bonusHP))
        ]);
    }
}
