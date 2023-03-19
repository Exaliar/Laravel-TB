<?php

namespace App\Http\Livewire\Calculator\Army;

use App\Config\MenuTypesConfig;
use App\Models\Army;
use Livewire\Component;

class TypeCheckFilter extends Component
{
    public $types = [];
    public $typesSelected = [];
    public $typesArmySelected = [];

    public function mount()
    {
        $this->types = MenuTypesConfig::TYPES;
        // dd($this->typesArmySelected);
    }

    public function render()
    {
        return view('livewire.calculator.army.type-check-filter');
    }

    public function updatedTypesArmySelected()
    {
        $this->validateRecivedData(MenuTypesConfig::TYPES, $this->typesArmySelected);
        $this->emit('renderArmyList', $this->typesArmySelected);
    }

    private function validateRecivedData (array $stack, array $serching)
    {
        foreach ($serching as $value) {
            if(!in_array($value, $stack)){
                abort(404);
            }
        }
    }
}
