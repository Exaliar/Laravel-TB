<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewArticleRequest;
use App\Http\Requests\UpdateNewArticleRequest;
use App\Models\NewArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class NewArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $articles = NewArticle::with('user')
            ->latest()
            ->get();
        return view('articles')->with('articles', $articles);
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
        $newArticle = new NewArticle();
        $newArticle->title = $request->floating_text;
        $newArticle->description = $request->floating_textarea;
        if ($request->floating_file !== null) {
            $newArticle->photo_path = $request->floating_file->store('articles', 'public');
        }
        $newArticle->user_id = Auth::user()->id;
        $newArticle->save();
        return redirect('/articles')->with('success', 'Artykuł został dodany pomyślnie.');
    }

    /**
     * Display the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        return view('articles', [
            'article' => NewArticle::findOrFail($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  integer $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        return view('articles', [
            'editArticle' => NewArticle::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNewArticleRequest  $request
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewArticleRequest $request, int $id)
    {
        $newArticle = NewArticle::findOrFail($id);
        // dd($newArticle);
        $newArticle->title = $request->floating_text;
        $newArticle->description = $request->floating_textarea;
        if ($request->floating_file === null) {
            $newArticle->save();
            return redirect('/articles')->with('success', 'Artykuł został zmieniony pomyślnie.');
        }

        if ($newArticle->photo_path !== null) {
            Storage::disk('public')->delete($newArticle->photo_path);
        }

        $newArticle->photo_path = $request->floating_file->store('articles', 'public');
        $newArticle->save();
        return redirect('/articles')->with('success', 'Artykuł został zmieniony pomyślnie.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  integer $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $newArticle = NewArticle::findOrFail($id);
        if ($newArticle->photo_path !== null) {
            Storage::disk('public')->delete($newArticle->photo_path);
        }
        $newArticle->delete();
        return redirect('/articles')->with('success', 'Artykuł został usunięty pomyślnie.');
    }
}
