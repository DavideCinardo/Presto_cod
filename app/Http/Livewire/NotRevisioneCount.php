<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class NotRevisioneCount extends Component
{
    public $count;
    
    public function render()
    {
        $this->count = Article::where('is_accepted', null)->count();
        return view('livewire.not-revisione-count');
    }
}
