<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\Category;
use App\Image;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        //
        'title'=> $faker->sentence,
        'img'=> $faker->imageUrl($width = 640, $height = 480),
        'subtitle'=> $faker->sentence,
        'body'=> $faker->paragraph(2),
        'category_id'=> Category::all()->random()->id,
        'img_id'=> Image::all()->random()->id
    ];
});