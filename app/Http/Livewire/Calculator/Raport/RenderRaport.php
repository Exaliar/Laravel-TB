<?php

namespace App\Http\Livewire\Calculator\Raport;

use Livewire\Component;

class RenderRaport extends Component
{

    public $raports = [];
    public $missingData = [];

    protected $listeners = [
        'calculatorRender'
    ];

    public function render()
    {
        return view('livewire.calculator.raport.render-raport');
    }

    public function calculatorRender($data)
    {
        // dd($data);
        $this->raports = $data['raport'];
        $this->missingData = $data['errors'];
    }
}
