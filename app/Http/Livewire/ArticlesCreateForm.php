<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ArticlesCreateForm extends Component
{
    public $title, $price, $description, $location, $category;
        protected $rules = [
            'title' => 'required',
            'price' => 'required',
            'description' => 'required|min:10',
            'location' => 'required',
            'category' => 'required',
        ];
        protected $message = [
            '*.required' => 'Il campo è obbligatorio',
            'description.min' => 'Il minimo è di 10 caratteri',
        ];
         
        public function create(){
            $this -> validate();

            //recuper il record della categoria
            $article = $category = Category::find($this->category);
            $category->articles()->create([
                'title' => $this -> title,
                'price' => $this -> price,
                'description' => $this -> description,
                'location' => $this -> location,

                
            ]);
            
            //collegare l'articolo all'user loggato che inserisce 'annuncio
            Auth::user()->articles()->save($article);

            //resettare i campi dopo l'inserimento
            $this -> reset();
            
            //messaggio di avvenuto inserimento
            session()->flash('articleCreated', 'Complimenti, hai creato la tua inserzione.');
        }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.articles-create-form', compact('categories'));
    }
}
