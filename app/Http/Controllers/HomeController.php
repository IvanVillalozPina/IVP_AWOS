<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Image;
use App\Article;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $images = Image::count();
        $articles = Article::count();
        //dd ($articles);
        //dd(User::count());
        //dd ($images);
        return view('index', [
            'users' => $users,
            'categories' => $categories,
            'images' => $images,
            'articles' => $articles

        ]);
    }

    /* obtener cuanto usuarios hay dentro de base de datos */

  
}