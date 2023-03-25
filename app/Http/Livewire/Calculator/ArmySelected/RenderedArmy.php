<?php

namespace App\Http\Livewire\Calculator\ArmySelected;

use App\Models\Army;
use Illuminate\Support\Arr;
use Livewire\Component;

class RenderedArmy extends Component
{
    // public $armySelected = [];
    public $armySelected;

    protected $listeners = [
        'addArmyUnit',
        'massIncreaseBonusAP',
        'massDecreaseBonusAP',
        'massIncreaseBonusHP',
        'massDecreaseBonusHP',
        'saveUnit'
    ];

    public function mount()
    {
        if (session()->exists('armySelected')) {
            $this->armySelected = session('armySelected');
        //    dump(session('armySelected'));
        } else {
            $this->armySelected = collect();
        }
        // $this->addArmyUnit(Army::first());
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

    public function massIncreaseBonusAP(float $bonus)
    {
        if ($this->armySelected->isEmpty()) {
            return;
        }
        foreach ($this->armySelected as $key => $value) {
            $value['bonusAP'] += $bonus;
            $army = Army::findOrFail($value['id']);
            $value['render'] =  $this->prepreData($army, $value['ilosc'], 1, $value['bonusAP'], $value['bonusHP'])->toArray();
            $this->armySelected[$key] = $value;
        }
    }

    public function massDecreaseBonusAP(float $bonus)
    {
        if ($this->armySelected->isEmpty()) {
            return;
        }

        foreach ($this->armySelected as $key => $value) {
            $value['bonusAP'] -= $bonus;
            if ($value['bonusAP'] < 0) {
                $value['bonusAP'] = 0;
            }
            $army = Army::findOrFail($value['id']);
            $value['render'] =  $this->prepreData($army, $value['ilosc'], 1, $value['bonusAP'], $value['bonusHP'])->toArray();
            $this->armySelected[$key] = $value;
        }
    }

    public function massIncreaseBonusHP(float $bonus)
    {
        if ($this->armySelected->isEmpty()) {
            return;
        }

        foreach ($this->armySelected as $key => $value) {
            $value['bonusHP'] += $bonus;
            $army = Army::findOrFail($value['id']);
            $value['render'] =  $this->prepreData($army, $value['ilosc'], 1, $value['bonusAP'], $value['bonusHP'])->toArray();
            $this->armySelected[$key] = $value;
        }
    }

    public function massDecreaseBonusHP(float $bonus)
    {
        if ($this->armySelected->isEmpty()) {
            return;
        }

        foreach ($this->armySelected as $key => $value) {
            $value['bonusHP'] -= $bonus;
            if ($value['bonusHP'] < 0) {
                $value['bonusHP'] = 0;
            }
            // dump($value);
            $army = Army::findOrFail($value['id']);
            $value['render'] =  $this->prepreData($army, $value['ilosc'], 1, $value['bonusAP'], $value['bonusHP'])->toArray();
            $this->armySelected[$key] = $value;
        }
    }
    public function saveUnit()
    {
        if ($this->armySelected->isEmpty()) {
            return;
        }
        session(['armySelected' => $this->armySelected]);
    }

    public function removeArmyUnit(int $id)
    {
        $this->armySelected->forget($id);
        $this->armySelected = $this->armySelected->values();
    }

    public function updatedArmySelected($value, $id)
    {
        $keys = explode('.', $id);
        // dd($keys);
        $data = $this->armySelected->toArray();
        $army = Army::findOrFail($data[$keys[0]]['id']);
        $data[$keys[0]][$keys[1]] = $value;
        $data[$keys[0]]['render'] =  $this->prepreData($army, $this->armySelected[$keys[0]]['ilosc'], 1, $this->armySelected[$keys[0]]['bonusAP'], $this->armySelected[$keys[0]]['bonusHP'])->toArray();
        $this->armySelected = collect($data);

        // $this->armySelected[$keys[0]][$keys[1]] = $value;
        // foreach ($this->armySelected as $key => $eachArmy) {
        //     dd($eachArmy);
        //     $army = Army::findOrFail($eachArmy['id']);
        //     Arr::set($this->armySelected, $id, $value);
        //     $eachArmy['render'] = $this->prepreData($army, $eachArmy['ilosc'], 1, $eachArmy['bonusAP'], $eachArmy['bonusHP'])->toArray();
        // }
    }

    private function prepreData($relacja, int $ilosc = 1,int $multiple = 1,float $bonusAP = 0,float $bonusHP = 0)
    {
        // dd($relacja);
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
