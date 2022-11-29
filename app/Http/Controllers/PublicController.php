<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller

{   
    //funzione che ci fa visualizzare la homepage
    public function homepage(){
        
        // passa gli articoli alla homepage
        $articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->get();
        $categories = Category::all();
        $last_articles = Article::where('is_accepted', true)->orderBy('created_at', 'DESC')->take(3)->get();
        return view ('welcome', compact('articles', 'categories', 'last_articles'));
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

    //funzione per lo switch delle lingue
    public function setLanguage($lang){
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
