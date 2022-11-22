<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticlesCreateForm extends Component
{
    public $title, $price, $description, $location;
        protected $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required|min:10',
            'location' => 'required',
        ];
        protected $message = [
            '*.required' => 'Il campo è obbligatorio',
            'description.min' => 'Il minimo è di 10 caratteri',
        ];
         
        public function create(){
            $this -> validate();
            Article::create([
                'title' => $this -> title,
                'price' => $this -> price,
                'description' => $this -> description,
                'location' => $this -> location,
                $this -> reset(),
                
                session()->flash('articleCreated', 'Complimenti, hai creato la tua inserzione.')

            ]); 

        }

    public function render()
    {
        return view('livewire.articles-create-form');
    }
}
