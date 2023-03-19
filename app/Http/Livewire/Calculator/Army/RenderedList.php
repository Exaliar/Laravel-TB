<?php

namespace App\Http\Livewire\Calculator\Army;

use App\Config\MenuTypesConfig;
use App\Models\Army;
use Illuminate\Support\Collection;
use Livewire\Component;

class RenderedList extends Component
{
    public $typesArmySelected = [];
    public $sordedSelectedArmyies = [];
    public $sortedArmy;

    protected $listeners = [
        'renderArmyList'
    ];

    public function mount()
    {
        $this->typesArmySelected = Army::select('id', 'lvl', 'name', 'menu_type')->get()->toArray();

        // $start_time = microtime(true);

        foreach (MenuTypesConfig::TYPES as $type) {
            $this->sortedArmy[$type] = [];
        }
        foreach ($this->typesArmySelected as $eachRowArmy) {
            $this->sortedArmy[$eachRowArmy['menu_type']][$eachRowArmy['name']][$eachRowArmy['lvl']] = ['id' => $eachRowArmy['id']];
        }
        $this->sortedArmy = collect($this->sortedArmy);

        $this->sordedSelectedArmyies = $this->sortedArmy->only(MenuTypesConfig::TYPES);
        // $end_time = microtime(true); // czas zakończenia pomiaru
        // $total_time = $end_time - $start_time; // czas wykonania kodu w sekundach
        // dd($total_time);
        // dd($this->typesArmySelected);
        // dd($this->sortedArmy->only(['guardsman', 'specialist', 'beast ']));
    }

    public function render()
    {
        return view('livewire.calculator.army.rendered-list');
    }

    public function renderArmyList(array $selectedArmy)
    {
        if (empty($selectedArmy)) {
            $selectedArmy = MenuTypesConfig::TYPES;
        }
        $this->sordedSelectedArmyies = $this->sortedArmy->only($selectedArmy);
    }
}
