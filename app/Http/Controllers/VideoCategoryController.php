<?php

namespace App\Http\Controllers;

use App\VideoCategory;
use Illuminate\Http\Request;
use Validator;

class VideoCategoryController extends Controller
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
        $video_categories = VideoCategory::latest()->paginate(20);
        return view('video_categories.index',compact('video_categories'));
    }



    /**
     * Create a new video instance after a valid addition.
     *
     * @param  array  $data
     * @return \App\Video
     */
    protected function create()
    {

     
        return view('video_categories.create');
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Validator::extend('without_spaces', function($attr, $value){
                return preg_match('/^\S*$/u', $value);
        });

        $validatedData = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
        ]);


        $user = auth()->user();

        VideoCategory::create([
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('video_categories.index')->with('message', 'Video Category successfully added.');
    }

    public function edit(VideoCategory $video_category)
    {
        return view('video_categories.edit')->with('video_category', $video_category);
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideoCategory $VideoCategory)
    {

       Validator::extend('without_spaces', function($attr, $value){
                           return preg_match('/^\S*$/u', $value);
                          });



        $request->validate([
            'title'         => 'required',
            //'prefix'        => 'required|alpha_dash',
            'description'   => 'required',
        ]);
  
        $VideoCategory->update($request->all());
  
        return redirect()->route('video_categories.index')
                         ->with('success','Category updated successfully');
    }   
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideoCategory $VideoCategory)
    {
        $VideoCategory->delete();
  
        return redirect()->route('video_categories.index')
                         ->with('success','Category deleted successfully');
    }     

}
