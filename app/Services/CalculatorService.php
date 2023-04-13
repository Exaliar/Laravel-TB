<?php

namespace App\Services;

use App\Config\UnitCategoryTypeConfig;
use Illuminate\Support\Collection;

class CalculatorService
{

    private $armies;
    private $monsters;
    private bool $firstAtak = true; //true - first atak army, false - first atak monster
    private $raport;
    private array $errors = [];
    private $test = 1;

    public function calculate()
    {
        $this->setArmyies();
        $this->setMonsters();
        $this->setFirstAtak();

        if (!empty($this->errors)) {
            return [
                'raport' => $this->raport,
                'errors' => $this->errors
            ];
        }

        $this->sortByAtakArmies();
        $this->sortByAtakMonsters();

        while ($this->countArmiesHP() > 0 && $this->countMonstersHP() > 0 && empty($this->errors)) {
            $prepareRaportData = [
                'army' => [],
                'monster' => []
            ];

            if ($this->firstAtak === true) {
                //ARMY ATTACK
                $this->firstAtak = false;
                //CHECK IF ANY UNIT EXIST TO ATTACK IN THIS ROUND
                if (!$this->armies->contains('action', true)) {
                    continue;
                }

                $prepareRaportData['action'] = true; //true - atak in right, false - atak in left - arrow to display derection attack in viue.
                $this->sortByAtakArmies();
                $attacker = $this->getAtakingUnit($this->armies);
                $prepareRaportData['army'] = $this->grabAttackingUnitData($attacker);

                $unitToAtack = $this->serchUnitToAtackByBonusAtack(attackedUnits: $this->monsters, attackingUnit: $attacker);
                //-----ATAK WITH BONUS-----
                if ($unitToAtack !== null) {
                    $prepareRaportData['monster'] = $this->doAttackWithBonusToMonsters(attackedUnitId: $unitToAtack['id'], attackingUnit: $attacker, biggestBonus: $unitToAtack['bonus']);
                } else {
                //-----ATAK WITHOUT BONUS-----
                    $machineDamage = $this->checkUnitIsSiegeEngine($attacker);
                    $unitToAtack = $this->serchUnitWithBiggestAttackOrHpOrBonuss(attackingUnit: $attacker, machineDamage: $machineDamage, attackedUnits: $this->monsters);
                    $prepareRaportData['monster'] = $this->doAttackWithoutBonusToMonster(attackedUnitId: $unitToAtack, attackingUnit: $attacker, machineDamage: $machineDamage);
                }
            } else {
                //MONSTER ATTACK
                $this->firstAtak = true;
                //CHECK IF ANY UNIT EXIST TO ATTACK IN THIS ROUND
                if (!$this->monsters->contains('action', true)) {
                    continue;
                }
                $prepareRaportData['action'] = false; //true - atak in right, false - atak in left - arrow to display derection attack in viue.
                $this->sortByAtakMonsters();
                $attacker = $this->getAtakingUnit($this->monsters);
                $prepareRaportData['monster'] = $this->grabAttackingUnitData($attacker);

                $unitToAtack = $this->serchUnitToAtackByBonusAtack(attackedUnits: $this->armies, attackingUnit: $attacker);
                 //-----ATAK WITH BONUS-----
                 if ($unitToAtack !== null) {
                    $prepareRaportData['monster'] = $this->doAttackWithBonusToMonsters(attackedUnitId: $unitToAtack['id'], attackingUnit: $attacker, biggestBonus: $unitToAtack['bonus']);
                } else {
                //-----ATAK WITHOUT BONUS-----
                    $machineDamage = $this->checkUnitIsSiegeEngine($attacker);
                    $unitToAtack = $this->serchUnitWithBiggestAttackOrHpOrBonuss(attackingUnit: $attacker, machineDamage: $machineDamage, attackedUnits: $this->armies);
                    $prepareRaportData['monster'] = $this->doAttackWithoutBonusToMonster(attackedUnitId: $unitToAtack, attackingUnit: $attacker, machineDamage: $machineDamage);
                }
            }

            if ((!$this->monsters->contains('action', true)) && (!$this->armies->contains('action', true))) {
                // dump(!$this->monsters->contains('action', true));
                // dump(!$this->armies->contains('action', true));
                $this->resetAtakingTurn($this->monsters);
                $this->resetAtakingTurn($this->armies);
            }
            $this->raport[] = $prepareRaportData;
            dump($this->armies);
            dump($this->monsters);
            dump($this->raport);
        }
        //zalozenie w sesji powinny znajdowac sie 3 zmienne
        //session armia = zawierajaca wszystkie wprowadzone przez urzytkownika jednostki armii wraz z juz obliczonymi wartosciami ataku i zycia
        //session monsters = zawierajaca wszystkie potwory z grupy obejmujaca rowniez liczbe danych jednostek ktora skrypt ma przygotowac
        //session firstAtak = ktora z wczesniejszych wykona pierwszy atak
        //zapisanie w atrybutach wojsk
        //jezeli nie ma dac komunikac metoda do komunikatow
        //stwierdzic kto pierwszy atakuje 2 metody ataku odpowiedzialne za atak
        //sortowanie jednostek w zgledem ataku
        //wszystkie obiekty jakie trafia maja byc kolekcjami caly service ma sie opierac na dzialaniach na kolekcjach
        //metoda odpowiedzialna za sprawdzanie bonusu
        //metoda liczaca bez bonusu
        //metoda liczaca z bonusem
        //sprawdzanie czy jest to katapulta
        //stworzyc pojemnik na zwracane dane
        //okreslic z grubsza ramy pojemnika co powinny zawierac
        //resetowanie licznika ataku
        //sprawdzanie licznika ataku
        //sprawdzanie hp czy istnieje do ataku
        $data = [
            'raport' => $this->raport,
            'errors' => $this->errors
        ];
        return $data;
    }

    private function setArmyies()
    {
        if (session()->has('armySelected')) {
            $data = [];
            foreach (session('armySelected') as $key => $value) {
                $data[$key] = $value['render'];
            }
            $this->armies = collect($data);
        } else {
            $this->errors = [
                'army' => 'Proszę wybrać jednostki armii by dokonać obliczeń.'
            ];
        }
    }

    private function setMonsters()
    {
        if (session()->has('monsterSelected')) {
            $data = [];
            foreach (session('monsterSelected.render') as $value) {
                if ($value['mnoznik'] > 1) {
                    for ($i = 0; $i < $value['mnoznik']; $i++) {
                        $data[] = $value;
                    }
                } else {
                    $data[] = $value;
                }
            }
            $this->monsters = collect($data);
        } else {
            $this->errors = [
                'monster' => 'Proszę wybrać jednostkę przeciwnika by dokonać obliczeń.'
            ];
        }
    }

    private function setFirstAtak()
    {
        if (session()->has('firstAtak')) {
            if (is_bool(session('firstAtak'))) {
                $this->firstAtak = session('firstAtak');
            } else {
                $this->firstAtak = true;
            }
        }
    }

    private function sortByAtakArmies()
    {
        $this->armies = $this->armies->sortByDesc('atak.0.total_atak');
    }

    private function sortByAtakMonsters()
    {
        $this->monsters = $this->monsters->sortByDesc('atak.0.total_atak');
    }

    private function countArmiesHP()
    {
        return $this->armies->sum('zycie_all');
    }

    private function countMonstersHP()
    {
        return $this->monsters->sum('zycie_all');
    }

    private function countGroupCanAttack(collection $data)
    {
        if ($data->count) {
            # code...
        }
    }

    private function getAtakingUnit($units)
    {
        $first = true;
        $armyUnit = [];
        $units->transform(function ($item, $key) use (&$first, &$armyUnit) {
            if ($first == true && $item['action'] == true) {
                $item['action'] = false;
                $first = false;
                $armyUnit = $item;
                return $item;
            }
            return $item;
        });
        return $armyUnit;
    }

    private function grabAttackingUnitData($attackingUnit)
    {
        return [
            'lvl' => $attackingUnit['lvl'],
            'name' => $attackingUnit['nazwa'],
            'count_unit' => $attackingUnit['ilosc'],
            'lost_trops' => 0,
            'death' => false
        ];
    }

    private function serchUnitToAtackByBonusAtack($attackedUnits, $attackingUnit): ?array
    {
        // dump($attackedUnits);
        // dump($attackingUnit);

        $biggestBonus = 0;
        $unitToAttackByBiggestBonus = null;

        foreach ($attackedUnits as $key => $attackedUnit) {

            if ($attackedUnit['zycie_all'] < $attackingUnit['atak'][0]['total_atak']) { // podlega testom
                continue;
            }
            $bonusToAttackedUnit = 0;
            foreach ($attackedUnit['typ'] as $eachAttackedUnitType) {

                if ($eachAttackedUnitType !== null) {

                    $bonus = match ($eachAttackedUnitType) {
                        $attackingUnit['atak'][1]['nazwa'] => $attackingUnit['atak'][1]['bonus'],
                        $attackingUnit['atak'][2]['nazwa'] => $attackingUnit['atak'][2]['bonus'],
                        $attackingUnit['atak'][3]['nazwa'] => $attackingUnit['atak'][3]['bonus'],
                        default => 0
                    };

                    $bonusToAttackedUnit += $bonus;
                }
            }

            if ($biggestBonus < $bonusToAttackedUnit) { //podlega testom
                // if ($biggestBonus < $bonusToAttackedUnit && $attackedUnit['zycie_all'] > $attackingUnit['atak'][0]['total_atak']) {
                $biggestBonus = $bonusToAttackedUnit;
                $unitToAttackByBiggestBonus = $key;
            }
        }
        if ($biggestBonus !== 0) {
            return [
                'id' => $unitToAttackByBiggestBonus,
                'bonus' => $biggestBonus
            ];
        }
        return null;
    }

    private function doAttackWithBonusToMonsters($attackedUnitId, $attackingUnit, $biggestBonus = 0): array
    {
        $prepare = [
            'lvl' => $this->monsters[$attackedUnitId]['lvl'],
            'name' => $this->monsters[$attackedUnitId]['nazwa'],
            'count_unit' => $this->monsters[$attackedUnitId]['ilosc'],
            // 'lost_trops' => 0,
            // 'death' => false
        ];

        $atakWithBonus = $attackingUnit['ilosc'] * (($attackingUnit['atak_each'] / 100) * (100 + ($attackingUnit['bonusAP'] ?? 0) + $biggestBonus));

        $this->monsters->transform(function (array $attackedUnit, int $key) use ($attackedUnitId, $atakWithBonus, &$prepare) {
            if ($key == $attackedUnitId) {
                // dd($attackedUnit);
                $healthAttackedUnit = $attackedUnit['zycie_all'];
                $attackedUnit['zycie_all'] -= $atakWithBonus;

                if ($attackedUnit['zycie_all'] <= 0) {
                    $prepare['damage'] = $healthAttackedUnit;
                    $prepare['death'] = true;
                    $prepare['lost_trops'] = $attackedUnit['ilosc'];
                    unset($attackedUnit);
                } else {
                    $prepare['damage'] = $atakWithBonus;
                    $prepare['death'] = false;
                    $prepare['lost_trops'] = floor($atakWithBonus / $attackedUnit['zycie_each']);
                    $attackedUnit['ilosc'] = ceil($attackedUnit['zycie_all'] / $attackedUnit['zycie_each']);
                    $attackedUnit['atak'][0]['total_atak'] = $attackedUnit['ilosc'] * $attackedUnit['atak_each'];
                }
            }
            return $attackedUnit;
        });
        // dd($prepare, $attackingUnit, $attackedUnitId, $this->monsters);
        return $prepare;
    }

    private function checkUnitIsSiegeEngine($attacker)
    {
        return ($attacker['typ'][0] == UnitCategoryTypeConfig::SIEGE_ENGINE ||
                $attacker['typ'][1] == UnitCategoryTypeConfig::SIEGE_ENGINE ||
                $attacker['typ'][2] == UnitCategoryTypeConfig::SIEGE_ENGINE)
                ?
         $machineDamage = 20 :
         $machineDamage = 1;
    }

    private function serchUnitWithBiggestAttackOrHpOrBonuss($attackingUnit, $machineDamage, $attackedUnits)
    {
        $attackWithoutBonus = $attackingUnit['ilosc'] * ((($attackingUnit['atak_each']/100)/$machineDamage) * (100 + $attackingUnit['bonusAP'] ?? 0));
        $biggestAttack = 0;
        $biggestHp = 0;
        $biggestAttackId = null;
        $biggestHpId = null;
        $biggestBonusAtakId = null;
        $idUnitToAtack = null;

        foreach ($attackedUnits as $key => $attackedUnit) {
            $baseAttack = $attackedUnit['ilosc'] * $attackedUnit['atak_each'];
            if ($attackWithoutBonus < $attackedUnit['zycie_all'] && $biggestAttack < $baseAttack) {
                $biggestAttack = $baseAttack;
                $biggestAttackId = $key;
            } elseif ($attackWithoutBonus > $attackedUnit['zycie_all'] && $biggestHp < $attackedUnit['zycie_all']) {
                //sprawdzenie czy dane z ataku potworow bede wlasciwe mozliwe jest stworzenie kolejnej funkcji bez tego ifelse
                $biggestHp = $attackedUnit['zycie_all'];
                $biggestHpId = $key;
            }

            if ($attackedUnit['zycie_all'] < $attackWithoutBonus) { // podlega testom
                continue;
            }

            foreach ($attackedUnit['typ'] as $eachAttackedUnitType) {

                if ($eachAttackedUnitType !== null) {

                    $bonus = match ($eachAttackedUnitType) {
                        $attackingUnit['atak'][1]['nazwa'] => $attackingUnit['atak'][1]['bonus'],
                        $attackingUnit['atak'][2]['nazwa'] => $attackingUnit['atak'][2]['bonus'],
                        $attackingUnit['atak'][3]['nazwa'] => $attackingUnit['atak'][3]['bonus'],
                        default => 0
                    };
                    $attack = $attackedUnit['ilosc'] * (($attackedUnit['atak_each']/100) * (100 + $bonus + $attackingUnit['bonusAP'] ?? 0));
                    $biggestBonusAtakId = ($biggestAttack < $attack ? $key : null);
                }
            }
        }
        $idUnitToAtack = ($idUnitToAtack ?? $biggestBonusAtakId);
        $idUnitToAtack = ($idUnitToAtack ?? $biggestAttackId);
        $idUnitToAtack = ($idUnitToAtack ?? $biggestHpId);
        return $idUnitToAtack;
    }

    private function doAttackWithoutBonusToMonster($attackedUnitId, $attackingUnit, $machineDamage)
    {
        $prepare = [
            'lvl' => $this->monsters[$attackedUnitId]['lvl'],
            'name' => $this->monsters[$attackedUnitId]['nazwa'],
            'count_unit' => $this->monsters[$attackedUnitId]['ilosc'],
            // 'lost_trops' => 0,
            // 'death' => false
        ];

        $atakWithoutBonus = $attackingUnit['ilosc'] * ((($attackingUnit['atak_each'] / 100)/$machineDamage) * (100 + $attackingUnit['bonusAP']));

        $this->monsters->transform(function (array $attackedUnit, int $key) use ($attackedUnitId, $atakWithoutBonus, &$prepare) {
            if ($key == $attackedUnitId) {
                // dd($attackedUnit);
                $healthAttackedUnit = $attackedUnit['zycie_all'];

                $attackedUnit['zycie_all'] -= $atakWithoutBonus;

                if ($attackedUnit['zycie_all'] <= 0) {
                    $prepare['damage'] = $healthAttackedUnit;
                    $prepare['death'] = true;
                    $prepare['lost_trops'] = $attackedUnit['ilosc'];
                    unset($attackedUnit);
                } else {
                    $prepare['damage'] = $atakWithoutBonus;
                    $prepare['death'] = false;
                    $prepare['lost_trops'] = floor($atakWithoutBonus / $attackedUnit['zycie_each']);
                    $attackedUnit['ilosc'] = ceil($attackedUnit['zycie_all'] / $attackedUnit['zycie_each']);
                    $attackedUnit['atak'][0]['total_atak'] = $attackedUnit['ilosc'] * $attackedUnit['atak_each'];
                }
            }
            return $attackedUnit;
        });
        // dd($prepare, $attackingUnit, $attackedUnitId, $this->monsters);
        return $prepare;
    }


    private function resetAtakingTurn($units)
    {
        // $first = true;
        // $armyUnit = [];
        $units->transform(function ($item, $key) {
                $item['action'] = true;
            return $item;
        });
    }
}
