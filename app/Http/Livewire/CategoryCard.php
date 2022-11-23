<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryCard extends Component
{
    public $categoryId;
    public $category;

    public function render(){
        
        $category = $this->category;
        $articles = Article::where('category_id', $this->categoryId)->get();
        return view('livewire.category-card', compact('articles', 'category'));
    }
}
