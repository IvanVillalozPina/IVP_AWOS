<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* USUARIOS */
/* index lista */

/* Usuarios*/
/* get obtenemos los  datos en BD del usuario con la funcion index*/
Route::get('/user','UserController@index');
/* store guarda datos en BD */
Route::post('/users', 'UserController@store')->name('user.store');
/* Delete elima datos */
Route::delete('/users/{user}' ,'UserController@delete')->name('user.destroy');

/* Categorias */

Route::get('/category','CategoryController@index');
Route::post('/categories','CategoryController@store')->name('category.store');
Route::get('/categories/{$id}','CategoryController@edit')->name('category.edit');
Route::delete('/categories/{category}','CategoryController@delete')->name('category.destroy');

/* Articulos */

Route::get('/article','ArticleController@index');
Route::get('/article/add','ArticleController@create');
Route::post('/articles','ArticleController@store')->name('article.store');
Route::put('/articles/{$id}','ArticleController@edit')->name('article.edit');
Route::delete('/articles/{article}','ArticleController@delete')->name('article.destroy');
Route::get('/articles/{$id}','ArticleController@show');
// Form GRID add articles;

/* Imagenes */

Route::get('/image','ImageController@index');
Route::post('/images','ImageController@store')->name('image.store');
Route::get('/images/{$id}','ImageController@edit')->name('image.edit');
Route::delete('/images/{image}','ImageController@delete')->name('image.destroy');

/* Auth Routes */
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

/*Email mailtrap*/
Route::get('enviar',['as'=>'enviar', function(){
    $data= ['link'=>'https://digital-pineapple.com.mx'];

    Mail::send('emails.notificacion', $data, function($message){
        $message->from('ventas@digital-pineapple.com.mx', 'digital-pinneaple.com.mx');
        $message->to('dsm41@gmail.com')->subject('Este es mi primer correo con mailtrap desde laravel');
    });
    return "Se envio el email";
}]);