<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMonsterRequest;
use App\Http\Requests\UpdateMonsterRequest;
use App\Models\Monster;

class MonsterController extends Controller
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
     * @param  \App\Http\Requests\StoreMonsterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMonsterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function show(Monster $monster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function edit(Monster $monster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMonsterRequest  $request
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMonsterRequest $request, Monster $monster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Monster  $monster
     * @return \Illuminate\Http\Response
     */
    public function destroy(Monster $monster)
    {
        //
    }
}
