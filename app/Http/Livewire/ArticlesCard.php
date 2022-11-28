<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArticlesCard extends Component
{
    public $article;

    public function render()
    {   
        $article = $this->article;

        return view('livewire.articles-card', compact('article'));
    }
}
