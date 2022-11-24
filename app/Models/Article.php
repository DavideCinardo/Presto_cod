<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'price',
        'description',
        'location',
        'cover',
        'user_id',
    ];

    //relazione con category
    public function Category(){
        return $this->belongsTo(Category::class);
    }

    //relazione con user
    public function User(){
        return $this->belongsTo(User::class);
    }

    //salvataggio cambio parametro accettazione
    public function setAccepted($value){
        $this->is_accepted= $value;
        $this->save();
        return true;
    }

    //funzione contatore articoli da revisionare
    public static function toBeRevaisonedCount(){
        return Article::where('is_accepted', null)->count();
    }
}
