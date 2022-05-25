<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'kandidat', 'as' => 'kandidat.'], function(){
    Route::get('/', [KandidatController::class, 'index'])->name('list-kandidat');
    Route::get('/create', [KandidatController::class, 'create'])->name('create');
    Route::post('/store', [KandidatController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [KandidatController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KandidatController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [KandidatController::class, 'destroy'])->name('destroy');
    Route::get('/detail/{id}', [KandidatController::class, 'show'])->name('show');

});

Route::get('/home', function () {
    return view('home');
})->name('home');