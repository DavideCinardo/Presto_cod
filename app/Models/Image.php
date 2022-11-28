<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['path', 'article_id'];

    //funzione di relazione con article
    public function article(){
        $this->belongsTo(Article::class);
    }
}
