<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;
use Validator;

class GenreController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::latest()->paginate(20);
        return view('genres.index',compact('genres'));
    }

    /**
     * Create a new video instance after a valid addition.
     *
     * @param  array  $data
     * @return \App\Video
     */
    protected function create()
    {
        return view('genres.create');
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
        ]);


        $user = auth()->user();

        Genre::create([
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('genres.index')->with('message', 'Genre successfully added.');
    }

    public function edit(Genre $genre)
    {
        return view('genres.edit')->with('genre', $genre);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $Genre)
    {
        $request->validate([
            'title'         => 'required',
            'description'   => 'required',
        ]);
  
        $Genre->update($request->all());
  
        return redirect()->route('genres.index')
                         ->with('success','Genre updated successfully');
    }   
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $Genre)
    {
        $Genre->delete();
  
        return redirect()->route('genres.index')
                         ->with('success','Genre deleted successfully');
    }     

}
