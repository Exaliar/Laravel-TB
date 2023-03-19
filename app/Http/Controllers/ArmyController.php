<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArmyRequest;
use App\Http\Requests\UpdateArmyRequest;
use App\Models\Army;

class ArmyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArmyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArmyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function show(Army $army)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function edit(Army $army)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArmyRequest  $request
     * @param  \App\Models\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArmyRequest $request, Army $army)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Army  $army
     * @return \Illuminate\Http\Response
     */
    public function destroy(Army $army)
    {
        //
    }
}
