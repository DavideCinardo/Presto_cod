<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesCard extends Component
{
    public function render()
    {
        $articles = Article::orderBy('created_at', 'DESC')->get();

        return view('livewire.articles-card', compact('articles'));
    }
}
