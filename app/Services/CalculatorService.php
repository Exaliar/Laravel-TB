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
                'monster' => [],
                // 'action' true - atak w prawo, false - atak w lewo.
            ];

            if ($this->firstAtak) {
                //atakuje armia
                if (!$this->armies->contains('action', true)) {
                    $this->firstAtak = false;
                    continue;
                }
                $prepareRaportData['action'] = true;

                $attacker = $this->getAtakingUnit($this->armies);
                dump($attacker);
                $prepareRaportData['army'] = $this->grabArmyData($attacker);

                $unitToAtack = $this->serchUnitToAtackByBonusAtack(attackedUnits: $this->monsters, attackingUnit: $attacker);

                //-----ATAK Z BONUSEM-----
                if ($unitToAtack !== null) {
                    $prepareRaportData['monster'] = $this->doAttackWithBonusToMonsters(attackedUnitId: $unitToAtack['id'], attackingUnit: $attacker, biggestBonus: $unitToAtack['bonus']);
                } else {
                    $machineDamage = $this->checkUnitIsSiegeEngine($attacker);
                    $unitToAtack = $this->serchUnitWithBiggestAttackOrHp(attackingUnit: $attacker, machineDamage: $machineDamage, attackedUnits: $this->monsters);
                }



                // dd($idUnitToAtack);
                // $this->armiesAttack($atakingUnit);

                //znalezienie jednostki z najwiekszym atakiem podstawowym
                // po posortowaniu powinna byc pierwsza ale trzeba rowniez sprawdzic czy juz odbyla atak

                $this->firstAtak = false;
            } else {
                //atakuje monster
                if (!$this->monsters->contains('action', true)) {
                    $this->firstAtak = false;
                    continue;
                }
                $prepareRaportData['action'] = false;
                $attacker = $this->getAtakingUnit($this->monsters);
                dump($attacker);
                $prepareRaportData['monster'] = $this->grabArmyData($attacker);

                $this->firstAtak = true;
            }

            if ((!$this->monsters->contains('action', true)) && (!$this->armies->contains('action', true))) {
                dump(!$this->monsters->contains('action', true));
                dump(!$this->armies->contains('action', true));
                $this->resetAtakingTurn();
            }
            $this->raport[] = $prepareRaportData;
            // dump($this->armies);
            // dump($this->monsters);
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
            // dd($item);
            return $item;
        });
        return $armyUnit;
    }

    private function grabArmyData($army)
    {
        // dd($army);
        return [
            'lvl' => $army['lvl'],
            'name' => $army['nazwa'],
            'count_unit' => $army['ilosc'],
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

        $atakWithBonus = $attackingUnit['ilosc'] * (($attackingUnit['atak_each'] / 100) * (100 + $attackingUnit['bonusAP'] + $biggestBonus));

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
        if (
            $attacker['typ'][0] == UnitCategoryTypeConfig::SIEGE_ENGINE ||
            $attacker['typ'][1] == UnitCategoryTypeConfig::SIEGE_ENGINE ||
            $attacker['typ'][2] == UnitCategoryTypeConfig::SIEGE_ENGINE
        ) {
            return $machineDamage = 20;
        } else {
            return $machineDamage = 1;
        }
    }

    private function serchUnitWithBiggestAttackOrHp($attackingUnit, $machineDamage, $attackedUnits)
    {
        $attackWithoutBonus = $attackingUnit * ((($attackingUnit['atak_each']/100)/$machineDamage) * (100 + $attackingUnit['bonusAP']));
        $biggestAttack = 0;
        $biggestAttackId = null;
        $biggestHp = 0;
        $biggestHpId = null;
        $idUnitToAtack = null;

        foreach ($attackedUnits as $key => $attackedUnit) {
            $baseAttack = $attackedUnit['ilosc'] * $attackedUnit['atak_each'];
            if ($attackWithoutBonus < $attackedUnit['zycie_all'] && $biggestAttack < $baseAttack) {
                $biggestAttack = $baseAttack;
                $biggestAttackId = $key;
            } elseif ($attackWithoutBonus > $attackedUnit['zycie_all'] && $biggestHp < $attackedUnit['zycie_all']) {
                $biggestHp = $attackedUnit['zycie_all'];
                $biggestHpId = $key;
            }
            if ($biggestAttackId !== null) {
                $idUnitToAtack = $biggestAttackId;
            } else {
                $idUnitToAtack = $biggestHpId;
            }
        }
    }
    private function resetAtakingTurn()
    {
        dd($this->raport);
    }
}
