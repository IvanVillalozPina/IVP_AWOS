<?php

use Illuminate\Database\Seeder;
//Llamamos a nuestro modelo
use App\Tags;
use App\Image;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\BD;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Definimos la cantidad de registros que vamos a ingresar en la BD
        $cantidadTags=200;
        $cantidadImages=200;
        //Hacemos la llamada a nuestro factory de tags y utilizamos el metodo create para insertar la cantidad de datos a nuestra BD
        factory(Tags::class,$cantidadTags)->create();
        factory(Image::class,$cantidadImages)->create();
        factory(Category::class,200)->create();
        factory(Article::class,200)->create();

        // $this->call(UsersTableSeeder::class);
    }
}



