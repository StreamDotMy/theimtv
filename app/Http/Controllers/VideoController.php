<?php

namespace App\Http\Controllers;

use App\Video;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
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
        $videos = Video::latest()->paginate(5);
  
        return view('videos.index',compact('videos'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Get a validator for an incoming create request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'synopsis' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],

        ]);
    }

    /**
     * Create a new video instance after a valid addition.
     *
     * @param  array  $data
     * @return \App\Video
     */
    protected function create()
    {
       return view('videos.create');
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
            'synopsis'      => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
        ]);


        $user = auth()->user();

        Video::create([
            'user_id'       => $user->id,
            'title'         => $request->input('title'),
            'synopsis'      => $request->input('synopsis'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('videos.index')->with('message', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */  
    
    public function show(Video $video)
    {
        return view('videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
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
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title'         => 'required',
            'synopsis'      => 'required',
            'description'   => 'required',
        ]);
  
        $video->update($request->all());
  
        return redirect()->route('videos.index')
                         ->with('success','Video updated successfully');
    }   
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
  
        return redirect()->route('videos.index')
                         ->with('success','Video deleted successfully');
    }    


    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */  
    
    public function upload($id)
    {
  
        $video = Video::findOrFail($id);
       // dd($video);
        return view('videos.upload.form',compact('video'));
    }    


     /**
     * Saving videos uploaded through XHR Request.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_video(Request $request)
    {
		
        $video = $request->file('file1');

        $request->validate([
			'file1'   =>  'required|mimetypes:video/mp4,video/mpeg,video/quicktime,video/x-flv,video/x-matroska,video/avi,video/msvideo,video/x-msvideo',

        ]);
  
        echo 'upload pass';

        }        
}
