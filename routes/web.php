<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
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
//rotte public
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
Route::get('/categories/{category}', [PublicController::class, 'category'])->name('category');
//rotte articles
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware('auth')->name('articles.create');
Route::get('/articles/index', [ArticleController::class, 'index'])->name('articles.index');


