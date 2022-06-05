<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KandidatController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\VotingController;
use App\Models\Category;
use App\Models\Voting;
use GuzzleHttp\Middleware;

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

Route::group(['prefix' => 'kandidat', 'as' => 'kandidat.', 'middleware' => 'can:is-admin'], function(){
    Route::get('/', [KandidatController::class, 'index'])->name('list-kandidat');
    Route::get('/create', [KandidatController::class, 'create'])->name('create');
    Route::post('/store', [KandidatController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [KandidatController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [KandidatController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [KandidatController::class, 'destroy'])->name('destroy');
    Route::get('/detail/{id}', [KandidatController::class, 'show'])->name('show');
    Route::get('/create/{locale}', 'App\Http\Controllers\LocalizationController@index');
    Route::get('/{locale}', 'App\Http\Controllers\LocalizationController@index');
    Route::get('/edit/{id}/{locale}', 'App\Http\Controllers\LocalizationController@index');
});

Route::get('/articles', [ArticlesController::class, 'index']);
Route::get('/articles/withoutcache', [ArticlesController::class, 'allWithoutcache']);
Route::get('/articles/{article:slug}', [ArticlesController::class, 'content']);

Route::get('/categories/{category:slug}', function(Category $category){
    return view('category', [
        "title" => 'Halaman Category',
        "articles" => $category->articles,
        "name" => $category->name
    ]);
});

Route::get('/voting', [VotingController::class, 'voting']);

Route::get('/categories', function(){
    return view('categories', [
        'title' => 'Categories',
        'categories' => Category::all()
    ]);
});
