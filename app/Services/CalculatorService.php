<?php

namespace App\Services;

use Illuminate\Support\Collection;

class CalculatorService
{

    private $armies;
    private $monsters;
    private bool $firstAtak; //true - first atak army, false - first atak monster
    private $raport;
    private $errors;
    private $test = 1;

    public function calculate()
    {
        $this->setArmyies();
        $this->setMonsters();
        $this->setFirstAtak();

        $this->sortByAtakArmies();
        $this->sortByAtakMonsters();

        while ($this->countArmiesHP() > 0 && $this->countMonstersHP() > 0) {
            $prepareRaportData = [
                'army' => [],
                'monster' => []
            ];

            if ($this->firstAtak) {
                // dump($this->armies);
                if (!$this->armies->contains('render.action', true)) {
                    $this->firstAtak = false;
                    continue;
                }
                $atakingUnit = $this->getAtakingUnitFromArmies();
                $atakingUnit = $this->getAtakingUnitFromArmies();
                $atakingUnit = $this->getAtakingUnitFromArmies();
                $atakingUnit = $this->getAtakingUnitFromArmies();
                $atakingUnit = $this->getAtakingUnitFromArmies();
                dd($atakingUnit);
                // $prepareRaportData['army'] = $this->grabArmyData($atakingUnit);
                // $this->armiesAttack($atakingUnit);

                //atakuje armia
                //znalezienie jednostki z najwiekszym atakiem podstawowym
                // po posortowaniu powinna byc pierwsza ale trzeba rowniez sprawdzic czy juz odbyla atak

                // $test = $this->test();
                // $test = $this->test();
                // dump($test);
                // $this->armies = $this->armies->map(function($item) use ($test){
                //     if ($item['id'] == $test['id']) {
                //         dump(1);
                //         return $item['render']['action'] = false;
                //     }
                // });
                // dump($this->armies);
                $this->firstAtak = false;
            } else {
                //atakuje monster
                $this->firstAtak = true;
            }
            $this->raport[] = $prepareRaportData;
            dd($this->raport);
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

        return;
    }

    private function setArmyies()
    {
        if (session()->has('armySelected')) {
            if (session('armySelected') instanceof Collection) {
                $this->armies = session('armySelected');
            } else {
                $this->armies = collect(session('armySelected'));
            }
        } else {
            $this->errors = [
                'army' => 'Proszę wybrać jednostki armii by dokonać obliczeń.'
            ];
        }
    }

    private function setMonsters()
    {
        if (session()->has('monsterSelected')) {
            if (session('monsterSelected') instanceof Collection) {
                $this->monsters = session('monsterSelected.render');
            } else {
                $this->monsters = collect(session('monsterSelected.render'));
            }
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
                $this->errors = [
                    'firstAtak' => 'Podana wartość nie pasuje do rządanej przez kalkulator.'
                ];
            }
        } else {
            $this->errors = [
                'firstAtak' => 'Proszę wybrać kto ma oddac pierwszy atak.'
            ];
        }
    }

    private function sortByAtakArmies()
    {
        $this->armies = $this->armies->sortByDesc('render.atak.0.total_atak');
        // dump($this->test);
        // $this->test = $this->test * 2;
        // dump($this->armies, $this->errors);
        // dump($this->armies);
    }

    private function sortByAtakMonsters()
    {
        // dump($this->monsters, $this->errors);
        $this->monsters = $this->monsters->sortByDesc('atak.0.total_atak');
        // dump($this->monsters);
    }

    private function countArmiesHP()
    {
        return $this->armies->sum('render.zycie');
    }

    private function countMonstersHP()
    {
        return $this->monsters->sum('zycie');
    }

    private function countGroupCanAttack(collection $data)
    {
        if ($data->count) {
            # code...
        }
    }

    private function getAtakingUnitFromArmies()
    {
        $first = true;
        $armyUnit = [];
        $this->armies->transform(function ($item, $key) use (&$first, &$armyUnit) {
            if ($first == true && $item['render']['action'] == true) {
                $item['render']['action'] = false;
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
            'lvl' => $army['render']['lvl'],
            'name' => $army['render']['nazwa'],
            'count_unit' => $army['ilosc'],
            'lost_trops' => 0,
            'death' => false,
            'action' => true
        ];
    }
}
