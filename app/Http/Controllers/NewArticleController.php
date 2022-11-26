<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewArticleRequest;
use App\Http\Requests\UpdateNewArticleRequest;
use App\Models\NewArticle;
use Carbon\Carbon;

class NewArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = NewArticle::with('user')->get();
        Carbon::setLocale('pl');
        return view('newArticle')->with('articles', $articles);
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
     * @param  \App\Http\Requests\StoreNewArticleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNewArticleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewArticle  $newArticle
     * @return \Illuminate\Http\Response
     */
    public function show(NewArticle $newArticle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewArticle  $newArticle
     * @return \Illuminate\Http\Response
     */
    public function edit(NewArticle $newArticle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewArticleRequest  $request
     * @param  \App\Models\NewArticle  $newArticle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleRequest $request, NewArticle $newArticle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewArticle  $newArticle
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewArticle $newArticle)
    {
        //
    }
}
