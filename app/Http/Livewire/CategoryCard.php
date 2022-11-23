<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CategoryCard extends Component
{
    public $categoryId;

    public function render()
    {   
        
        return view('livewire.category-card');
    }
}
