<?php

namespace App\Http\Livewire;

use App\Models\Article;
use App\Models\Category;
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
            $category = Category::find($this->category);
            $category->articles()->create([
                'title' => $this -> title,
                'price' => $this -> price,
                'description' => $this -> description,
                'location' => $this -> location,
                $this -> reset(),
                
                session()->flash('articleCreated', 'Complimenti, hai creato la tua inserzione.')

            ]);

            //creazione tabella article
            // Article::create([

            // ]); 

        }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.articles-create-form', compact('categories'));
    }
}
