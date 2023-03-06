<?php

namespace App\Http\Livewire\Calculator\MonsterSelected;

use App\Models\MonsterSquad;
use Exception;
use Livewire\Component;

class RenderedMonsterShort extends Component
{
    public $monsterSquad;
    public $monsterSquadDetal = [];

    public $monsters;

    protected $listeners = [
        'setMonsterSquad'
    ];

    public function mount()
    {
        // $this->monsterSquad = MonsterSquad::select('squad_type', 'lvl', 'type', 'id')->first();
    }

    public function render()
    {
        return view('livewire.calculator.monster-selected.rendered-monster-short');
    }

    public function setMonsterSquad($id)
    {
        $this->monsterSquad = MonsterSquad::select('squad_type', 'lvl', 'type', 'id')->find($id);
        // dd($this->monsterSquad);
    }

    public function getSquadDetal()
    {
        if ($this->monsterSquad == null) {
            return;
        }
        $this->monsters = MonsterSquad::with('firstMonster',
                'secondMonster',
                'thirdMonster',
                'fourthMonster',
                'fifthMonster',
                'sixthMonster',)
                ->where('id', $this->monsterSquad->id)
                ->firstOrFail();
                //posiadam id wybranego squadu
        if ($this->monsters->firstMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->first_monster_count, $this->monsters->firstMonster, $this->monsters->first_multiple);
        }
        if ($this->monsters->secondMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->second_monster_count, $this->monsters->secondMonster, $this->monsters->second_multiple);
        }
        if ($this->monsters->thirdMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->third_monster_count, $this->monsters->thirdMonster, $this->monsters->third_multiple);
        }
        if ($this->monsters->fourthMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->fourth_monster_count, $this->monsters->fourthMonster, $this->monsters->fourth_multiple);
        }
        if ($this->monsters->fifthMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->fifth_monster_count, $this->monsters->fifthMonster, $this->monsters->fifth_multiple);
        }
        if ($this->monsters->sixthMonster->exists()) {
            $this->monsterSquadDetal[] = $this->prepreData($this->monsters->sixth_monster_count, $this->monsters->sixthMonster, $this->monsters->sixth_multiple);
        }
        //w wybranym squadzie mam dostep to id potwora i ilosci jednostek

        //jest 6 relacji potworow co zrobic gdy wszystkie relacje nie wchodza w gre?

        //poprzez id potwora i relacje musze pobrac dane potwora i dokonac obliczen z iloscia jednostek

    }

  #attributes: array:19 [▼
//   "id" => "9883e3fe-6228-496a-ae9f-48fff5672ad7"
//   "squad_type" => "normal"
//   "lvl" => 1
//   "type" => "elf"
//   "first_monster" => 33
//   "first_monster_count" => 5261
//   "second_monster" => 41
//   "second_monster_count" => 4136
//   "third_monster" => 40
//   "third_monster_count" => 116
//   "fourth_monster" => 98
//   "fourth_monster_count" => 3030
//   "fifth_monster" => 79
//   "fifth_monster_count" => 4488
//   "sixth_monster" => 139
//   "sixth_monster_count" => 5080
//   "deleted_at" => null
//   "created_at" => "2023-02-20 19:45:32"
//   "updated_at" => "2023-02-20 19:45:32"

// "firstMonster" => App\Models\Monster {#1488 ▶}
// "secondMonster" => App\Models\Monster {#1497 ▶}
// "thirdMonster" => App\Models\Monster {#1504 ▶}
// "fourthMonster" => App\Models\Monster {#1511 ▶}
// "fifthMonster" => App\Models\Monster {#1518 ▶}
// "sixthMonster" => App\Models\Monster {#1525 ▶}

//  #attributes: array:18 [▼
//      "id" => 33
//      "lvl" => 7
//      "name" => "Mr. Jeramy Gorczany DDS"
//      "first_type" => "elemental"
//      "second_type" => "giant"
//      "third_type" => "fortification"
//      "strength" => 2034
//      "health" => 6550
//      "first_bonus" => 468
//      "first_bonus_who" => "dragon"
//      "second_bonus" => 305
//      "second_bonus_who" => "human"
//      "third_bonus" => 274
//      "third_bonus_who" => "dragon"
//      "graphics" => "https://www.kshlerin.com/aut-qui-est-voluptate-quis"
//      "deleted_at" => null
//      "created_at" => "2023-02-20 19:45:03"
//      "updated_at" => "2023-02-20 19:45:03"
//    ]


    private function prepreData($ilosc, $relacja, $multiple = 1, $bonusAP = 0, $bonusHP = 0)
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
            'atak' => [
                [
                    'nazwa' => 'Podstawa',
                    'bonus' => null,
                    'total_atak' => $ilosc * $relacja->strength
                ],
                [
                    //przeksztalcic wzor na bonus ap z armii gracza
                    // ilość jednostek * ((siła / 100) * (100 + bonus))
                    'nazwa' => $relacja->first_bonus_who,
                    'bonus' => $relacja->first_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->first_bonus))
                ],
                [
                    'nazwa' => $relacja->second_bonus_who,
                    'bonus' => $relacja->second_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->second_bonus))
                ],
                [
                    'nazwa' => $relacja->third_bonus_who,
                    'bonus' => $relacja->third_bonus,
                    'total_atak' => $ilosc * (($relacja->strength / 100) * (100 + $relacja->third_bonus))
                ]
                ],
                //przeksztalcic wzor na bonus hp z armii gracza
            'zycie' => $ilosc * $relacja->health
        ];

    }


}
