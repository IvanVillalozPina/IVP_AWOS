<?php

namespace App;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    // Relacion inversa uno a uno con article y category
    public function Article(){
        return $this->belongsTo(Article::class);
    }
    
}

