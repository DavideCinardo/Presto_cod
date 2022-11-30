<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class RevisorAccept extends Component
{
    public $article;

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

    public function render()    
    {   
        $this->article = Article::where('is_accepted', null)->first();
        return view('livewire.revisor-accept');
    }
}
