<?php

namespace App\Http\Livewire\Calculator\MonsterSelected;

use App\Models\MonsterSquad;
use Exception;
use Livewire\Component;

class RenderedMonster extends Component
{
    public $monsterSelected;

    private $monsters;

    protected $listeners = [
        'setMonsterSquad'
    ];

    public function mount()
    {
        $this->monsterSelected['render'] = [];

        if (session()->exists('monsterSelectedID')) {
            $this->setMonsterSquad(session('monsterSelectedID'));
        }
    }

    public function render()
    {
        return view('livewire.calculator.monster-selected.rendered-monster');
    }

    public function setMonsterSquad($id)
    {
        $this->monsters = MonsterSquad::with(
            'firstMonster',
            'secondMonster',
            'thirdMonster',
            'fourthMonster',
            'fifthMonster',
            'sixthMonster',)
            ->where('id', $id)
            ->get()
            ->first();

        $this->monsterSelected = [
            'squad_type' => $this->monsters->squad_type,
            'lvl' => $this->monsters->lvl,
            'type' => $this->monsters->type,
        ];
        $this->getSquadDetal();
        session()->forget('MonsterSelected');
        session(['monsterSelected' => $this->monsterSelected]);
    }

    public function getSquadDetal()
    {
        unset($this->monsterSelected['render']);

        if ($this->monsters->firstMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->firstMonster, $this->monsters->first_monster_count, $this->monsters->first_multiple);
        }
        if ($this->monsters->secondMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->secondMonster, $this->monsters->second_monster_count, $this->monsters->second_multiple);
        }
        if ($this->monsters->thirdMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->thirdMonster, $this->monsters->third_monster_count, $this->monsters->third_multiple);
        }
        if ($this->monsters->fourthMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->fourthMonster, $this->monsters->fourth_monster_count, $this->monsters->fourth_multiple);
        }
        if ($this->monsters->fifthMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->fifthMonster, $this->monsters->fifth_monster_count, $this->monsters->fifth_multiple);
        }
        if ($this->monsters->sixthMonster) {
            $this->monsterSelected['render'][] = $this->prepreData($this->monsters->sixthMonster, $this->monsters->sixth_monster_count, $this->monsters->sixth_multiple);
        }
    }

    private function prepreData($relacja, $ilosc = 1, $multiple = 1, $bonusAP = 0, $bonusHP = 0)
    {
        return [
            'nazwa' => $relacja->name,
            'lvl' => $relacja->lvl,
            'typ' => [
                $relacja->first_type,
                $relacja->second_type,
                $relacja->third_type
            ],
            'mnoznik' => $multiple,
            'ilosc' => $ilosc,
            'atak_each' => $relacja->strength,
            'atak' => [
                [
                    'nazwa' => 'Podstawa',
                    'bonus' => null,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $bonusAP))
                ],
                [
                    // ilość jednostek * ((siła / 100) * (100 + bonus + bonusGracza))
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
            'zycie' => $ilosc * (($relacja->health / 100) * (100 + $bonusHP)),
            'action' => true
        ];

    }


}
