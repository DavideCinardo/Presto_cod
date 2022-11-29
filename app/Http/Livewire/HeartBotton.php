<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class HeartBotton extends Component
{
    public $article;
    public $like = false;

    //funzione like
    public function like_menager(Article $article){
        if($this->like == false){
            $this->like = true;
            $article->user_like()->attach(Auth::user()->id);
        } else {
            $this->like= false;
            $article->user_like()->detach(Auth::id());
        }
    }


    public function render()
    {
        return view('livewire.heart-botton');
    }
}
