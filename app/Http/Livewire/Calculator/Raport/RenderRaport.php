<?php

namespace App\Http\Livewire\Calculator\Raport;

use Livewire\Component;

class RenderRaport extends Component
{

    public $dataRender = [];

    protected $listeners = [
        'calculatorRender'
    ];

    public function render()
    {
        return view('livewire.calculator.raport.render-raport');
    }

    public function calculatorRender($data)
    {
        $this->dataRender = $data;
    }
}
