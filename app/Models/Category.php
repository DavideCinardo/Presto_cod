<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Campi della tabella Category
    protected $fillable = [
        'name'
    ];

    //relazione con article
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
