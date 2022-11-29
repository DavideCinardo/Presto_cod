<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ArticlesCheckedCard extends Component
{
    public $article;

    //funzione per annullare ultima revisione
    public function nullRevision(){
        $this->article->is_accepted = null;
        $this->article->revisioned_from = 1;
        $this->article->save();

        session()->flash('nullRevision', 'Annullata revisione, ora puoi analizzare di nuovo l\'articolo');
    }

    public function render(){

        $articles = Article::where('revisioned_from', Auth::user()->id)->where('is_accepted', !null)->orderBy('updated_at', 'DESC')->get();
        $last = Article::where('revisioned_from', Auth::user()->id)->orderBy('updated_at', 'DESC')->first();
        return view('livewire.articles-checked-card', compact('articles', 'last'));
    }
}
