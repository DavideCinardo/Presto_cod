<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DismissRevision extends Component
{

    public $article;

    //funzione per annullare ultima revisione
    public function nullRevision(){
        $this->article->is_accepted = null;
        $this->article->revisioned_from = 1;
        $this->article->save();

        session()->flash('nullRevision', 'Annullata revisione, ora puoi analizzare di nuovo l\'articolo');
    }

    public function render()
    {
        return view('livewire.dismiss-revision');
    }
}
