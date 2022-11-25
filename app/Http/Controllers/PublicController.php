<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{

    public function homepage(){
        // mostra gli ultimi 3 articoli
        $lastArticles = Article::all()->sortByDesc('created_at')->take(3);
        
        // passa gli articoli alla homepage
        $articles = Article::all();
        $articles = compact('articles');
        return view ('welcome', compact('lastArticles'));
    }
   

    public function category(Category $category){
        
        return view ('articles.category', compact('category'));
    }
}
