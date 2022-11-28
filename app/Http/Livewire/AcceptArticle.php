<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AcceptArticle extends Component
{
    public $article;

    //funzione per accettare l'rticolo
    public function acceptArticle(){
        $this->article->revisioned_from = Auth::user()->id;
        $this->article->is_accepted = true;
        $this->article->save();
        
        session()->flash('accept', 'Hai accettato l\'articolo');
        
    }

    public function render()
    {   
        return view('livewire.accept-article');
    }
}
