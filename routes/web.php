<?php

use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewArticleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::controller(NewArticleController::class)->prefix('articles')->name('article.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/{article}', 'show')->name('show');

    Route::middleware('isAdmin')->group(function () {
        Route::post('/', 'store')->name('store');
        Route::get('/{article}/edit', 'edit')->name('edit');
        Route::put('/{article}', 'update')->name('update');
        Route::delete('/{article}', 'destroy')->name('destroy');
    });
});

Route::get('/calculator', CalculatorController::class)->name('calculator');
Route::post('/newsletter', ContactController::class)->name('newsletter')->middleware('throttle:contactForm');

Route::get('/', function () {
    return redirect('/articles');
})->name('home');
Route::get('/home', function () {
    return redirect('/articles');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
