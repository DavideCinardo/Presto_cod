<?php

namespace App\Models;

use App\Models\Image;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'title',
        'price',
        'description',
        'location',
        'user_id',
        'revisioned_from',
    ];

    //funzione per utilizzare laravel scout
    public function toSearchableArray(){
        
        $category = $this->category;
        $array = [
            'id'=> $this->id,
            'title'=> $this->title,
            'description'=> $this->description,
            'category' => $category,
        ];
        return $array;
    }

    //relazione con category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //relazione con user
    public function user(){
        return $this->belongsTo(User::class);
    }

    //relazione MtM con users
    public function users(){
        return $this->belongsToMany(User::class);
    }

    //funzione di relazione con image
    public function images(){
        return $this->hasMany(Image::class);
    }
}
