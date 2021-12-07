<?php

namespace App\Http\Controllers;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }   
    //

    public function index(){

        $images = Image::latest()->paginate(10);
        return view('images.index',[
        'images'=> $images
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
        Image::create([
            'name'=>$request->name,
        ]);
        return redirect('/image')->with('message', 'La imagen se ha agregado exitosamente!');
    }

    public function delete(Image $image){
        $image->delete();
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
        $image = Image::findOrFaild($id);
        return view('image/', compact('image','user'));
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

}