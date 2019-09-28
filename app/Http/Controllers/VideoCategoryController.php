<?php

namespace App\Http\Controllers;

use App\VideoCategory;
use Illuminate\Http\Request;

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
        $video_categories = VideoCategory::latest()->paginate(5);
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
        
        $validatedData = $request->validate([
            'title'         => ['required', 'string', 'max:255'],
            'prefix'        => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
        ]);


        $user = auth()->user();

        VideoCategory::create([
            'title'         => $request->input('title'),
            'prefix'        => $request->input('prefix'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('video_categories.index')->with('message', 'Video Category successfully added.');
    }

    public function edit(Video $video)
    {
        //dd($video);
        return view('videos.edit',compact('video'));
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
        $request->validate([
            'title'         => 'required',
            'prefix'        => 'required',
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
