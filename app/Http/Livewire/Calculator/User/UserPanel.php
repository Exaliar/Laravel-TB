<?php

namespace App\Http\Livewire\Calculator\User;

use Livewire\Component;
use App\Services\CalculatorService;

class UserPanel extends Component
{
    public $firstAtak = true;
    public $bonusAP = 25;
    public $bonusHP = 25;
    public $blads;

    public function render()
    {
        return view('livewire.calculator.user.user-panel');
    }

    public function firstAtakPlayer()
    {
        $this->firstAtak = true;
        session(['firstAtak' => $this->firstAtak]);
    }

    public function firstAtakMonster()
    {
        $this->firstAtak = false;
        session(['firstAtak' => $this->firstAtak]);
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

    public function fight()
    {
        $calculator = new CalculatorService;
        $data = $calculator->calculate();
        $this->emit('calculatorRender', $data);
        // dd($data);
        // if (!empty($data['errors'])) {
        //     $this->blads = $data['errors'];
        //     // $this->refresh();
        // } else {
        //     $this->blads = [];
        // }
        // dd($data);
        //stworzenie kopii z sessji jezeli istenija w sessji
        //sprawdzenie czy dane wejsciowe istenieja
        //tablica potworow
        //tablica armii
        //kto piewrszy atakuje
        //jezeli czegos brakuje zwrocenie wiadomosci zwrotnej do urzytkownia co poszlo nie tak

        //stworzenie service walki
        // WARUNEK 1 posortowanie danych wzgledem ataku podstawowego
        // WARUNEK 2 okreslenie kto atakuje pierwszy
        // WARUNEK 3 okreslenie jednostki ktora atakuje jako piewsza
        // WARUNEK 4 sprawdzenie czy jest to katapulta jzeli tak okreslic najwieksze mozliwe do zadania obrarzenia
        // WARUNEK 4 jezeli jest to jednostka normalna okreslic kogo bedzie atakowac
        //ataku beda sie obywac dopuki jedna grupa posiada chociaz 1 hp
        //sprawdzenie czy wszystkie jednostki w danej grupie przeprowadzily atak jezeli tak to przeciwnik bedzie atakowac dopuki nie skonczy mu sie kolejka ilosc jednostek ma znaczenie
        //

        // czym sie ma kierowac jednostka wybierajaca przeciwnika po wierwsze
        //uzyskac informacje na temat bonusu ataku jzeli ppodatna jednostka istnieje bedzie kolejny warunek

        //wewnatrz servisu bedzie metoda render
        //potrzebny widok jak ma wygladac walka moze uzyje juz gotowego wczesniejszego

        // PRZYGOTOWNIAE DANYCH CO TRZEBA ZROBIC ZEBY WYKONAC ATAK I WYSWIETLIC RAPORT

        //
    }

    public function save()
    {
        $this->emit('saveUnit');
    }
}
