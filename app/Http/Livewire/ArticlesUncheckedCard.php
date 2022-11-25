<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesUncheckedCard extends Component
{
    public function render()
    {
        $articles_unchecked = Article::where('is_accepted', null)->get();
        return view('livewire.articles-unchecked-card', compact('articles_unchecked'));
    }
}
