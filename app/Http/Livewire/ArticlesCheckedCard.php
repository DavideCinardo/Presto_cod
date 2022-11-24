<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArticlesCheckedCard extends Component
{
    public function render(){

        $articles_checked = Article::where('revisioned_from', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();
        $last_checked = Article::where('revisioned_from', Auth::user()->id)->orderBy('updated_at', 'DESC')->first();
        return view('livewire.articles-checked-card', compact('articles_checked', 'last_checked'));
    }
}
