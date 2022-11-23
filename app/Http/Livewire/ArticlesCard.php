<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesCard extends Component
{
    public function render()
    {   
        $articles = Article::all();
        return view('livewire.articles-card', compact('articles'));
    }
}
