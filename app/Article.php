<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Article extends Model
{
    /*     declaramos nuestros campos de nuestra tabla tags*/    
    protected $fillable = [
        'title',
        'img',
        'subtitle',
        'body',
        'category_id',
        'img_id',
    ];

    // Definimos la relacion de acticle y category uno a uno
    public function Category(){
        return $this->hasOne(Category::class);
    }

    public function Image(){
        return $this->hasOne(Image::class);
    }
    public function user(): BelongsTo{
       return $this->belongsTo(User::class);
   }
}
