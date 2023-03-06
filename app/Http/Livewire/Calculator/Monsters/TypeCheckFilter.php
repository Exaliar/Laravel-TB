<?php

namespace App\Http\Livewire\Calculator\Monsters;

use App\Config\MonstersTypeConfig;
use Livewire\Component;

class TypeCheckFilter extends Component
{

    public $types = [];
    public $typesSelected = [];

    public function mount()
    {
        $this->types = MonstersTypeConfig::TYPES;
    }

    public function updatedTypesSelected()
    {
        // $this->validateRecivedData(MonstersTypeConfig::TYPES, $this->typesSelected);
        $this->emit('typesSelected', $this->typesSelected);
    }

    public function render()
    {
        return view('livewire.calculator.monsters.type-check-filter');
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
