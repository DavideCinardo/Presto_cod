<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArticlesCard extends Component
{
    public function render()
    {   
        $articles = Article::where('is_accepted', !null)->orderBy('created_at', 'DESC')->get();

        return view('livewire.articles-card', compact('articles'));
    }
}
