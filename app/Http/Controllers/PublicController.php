<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller

{   
    //funzione che ci fa visualizzare la homepage
    public function homepage(){
        // mostra gli ultimi 3 articoli
        $lastArticles = Article::all()->sortByDesc('created_at')->take(3);
        
        // passa gli articoli alla homepage
        $articles = Article::all();
        $articles = compact('articles');
        return view ('welcome', compact('lastArticles'));
    }
   

    //funzione che ci porta alle pagine per categorie
    public function category(Category $category){
        
        return view ('articles.category', compact('category'));
    }

    //funzione che ci permette di ricercare con laravel scout
    public function seachArticles(Request $request){
        $search = $request->searched;
        $articles_searched = Article::search($request->searched)->where('is_accepted', true)->get();
        return view('articles.searched', compact('articles_searched', 'search'));
    }
}
