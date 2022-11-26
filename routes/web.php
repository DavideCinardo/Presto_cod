<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevaisorController;
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
Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

//rotte per articoli inseriti dall'utente loggato
Route::get('/articles/own', [ArticleController::class, 'own'])->name('articles.own');

//rotte del revisore
Route::get('/revaisor/index', [RevaisorController::class, 'index'])->middleware('isRevaisor')->name('revaisor.index');
Route::get('revaisor/article/show/{article_unchecked}', [RevaisorController::class, 'show'])->name('article.unchecked');
//rotta accetta articolo
Route::patch('accetta/article/{article}', [RevaisorController::class, 'acceptArticle'])->middleware('isRevaisor')->name('revaisor.accept_article');
//rotta rifiuta articolo
Route::patch('rifiuta/article/{article}', [RevaisorController::class, 'rejectArticle'])->middleware('isRevaisor')->name('revaisor.reject_article');
//rotta annulla ultima revisione
Route::patch('null/revision/{article_checked}', [RevaisorController::class, 'nullRevision'])->middleware('isRevaisor')->name('revaisor.null_revision');
//rotta diventa revisore
Route::post('become/revaisor', [RevaisorController::class, 'becomeRevaisor'])->middleware('auth')->name('become.revaisor');
//rotta rendi utente revisore
Route::get('give/revaisor/{user}', [RevaisorController::class, 'makeRevaisor'])->name('make.revaisor');

//rotta per ricercare gli annunci con laravel scout
Route::get('/search/article', [PublicController::class, 'seachArticles'])->name('articles.search');


