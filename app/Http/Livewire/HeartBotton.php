<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HeartBotton extends Component
{
    public $article;
    public $like;

    //funzione like
    public function like(){
        $this->article->users()->attach(Auth::user()->id);
        $this->like = true;
    }

    //funzione dislike
    public function dislike(){
        $this->article->users()->detach(Auth::user()->id);
        $this->like = false;
    }

    public function render()
    {
        return view('livewire.heart-botton');
    }
}
