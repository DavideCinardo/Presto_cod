<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RevisorAccept extends Component
{
    public $article;
    public $articles_unchecked;
    public $last;
    public $articles_checked;

    //funzione per accettare l'rticolo
    public function acceptArticle(){
        $this->article->revisioned_from = Auth::user()->id;
        $this->article->is_accepted = true;
        $this->article->save();
        
        session()->flash('accept', 'Hai accettato l\'articolo');
        
    }
    
    //funzione per rifiutare l'articolo
    public function rejectArticle(){
        $this->article->is_accepted = false;
        $this->article->save();

        session()->flash('reject', 'Hai rifiutato l\'articolo');
    }

    //funzione per annullare ultima revisione
    public function nullRevision($id){
        $this->article = Article::find($id);
        $this->article->is_accepted = null;
        $this->article->revisioned_from = 1;
        $this->article->save();

        session()->flash('nullRevision', 'Annullata revisione, ora puoi analizzare di nuovo l\'articolo');
    }

    public function render()    
    {   
        //prendere gli articoli da revisionare
        $this->articles_unchecked = Article::where('is_accepted', null)->first();
        //prendere gli articoli revisionati dal revisore loggato
        $this->articles_checked = Article::where('revisioned_from', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();

        $this->article = Article::where('is_accepted', null)->first();
        $this->last = Article::where('revisioned_from', Auth::user()->id)->where('is_accepted', !null)->orderBy('updated_at', 'DESC')->first();
        return view('livewire.revisor-accept');
    }
}
