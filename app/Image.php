<?php

namespace App;
use App\Article;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'name'
    ];

    public function Article(){
        return $this->belongsTo(Article::class);
    }
}