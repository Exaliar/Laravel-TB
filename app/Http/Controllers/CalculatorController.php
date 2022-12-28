<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CalculatorController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\View\View
     */
    public function __invoke() : View
    {
        return view('calculator');
    }
}
