<?php

namespace App\Http\Controllers;
/* Mandamos a llamar el modelo category */
use App\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    /* vamos a obtener todas las categorua de nuestra base de datos ELOQUEN ORM
        Select * from categories  */
    
    public function index(){
        $categories = Category::latest()->paginate(10);
        //return $categories;
        return view('categories.index',[
        'categories'=> $categories
        ]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect('/category')->with('message', 'La categoria se ha agregado exitosamente!');
    }
    public function delete(Category $category){
        $category->delete();
        return redirect('/category')->with('alert', 'La categoria se ha eliminado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id){
        $category = Category::findOrFaild($id);
        return view('/category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
}