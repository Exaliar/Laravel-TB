<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CalculatorController extends Controller
{
    public function __invoke() : View
    {
        return view('calculator');
    }
}
