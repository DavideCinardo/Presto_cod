<?php

namespace App\Http\Livewire;

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


    public function render()
    {
        return view('livewire.articles-create-form');
    }
}
