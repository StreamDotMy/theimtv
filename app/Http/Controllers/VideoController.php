<?php

namespace App\Http\Controllers;

use App\Video;
use App\VideoCategory;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Jobs\ConvertVideoForStreaming;


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
  
        return view('videos.index',compact('videos'));
               //->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Create a new video instance after a valid addition.
     *
     * @param  array  $data
     * @return \App\Video
     */
    protected function create()
    {
       $categories = VideoCategory::all()->pluck('title', 'id');  
       return view('videos.create')->with('categories', $categories);
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
            'video_category_id'   => ['required', 'string'],
            'title'         => ['required', 'string', 'max:255'],
            'synopsis'      => ['required', 'string', 'max:255'],
            'description'   => ['required', 'string'],
        ]);


        $user = auth()->user();
        Video::create([
            'user_id'       => $user->id,
            'video_category_id' => $request->input('video_category_id'),
            'title'         => $request->input('title'),
            'synopsis'      => $request->input('synopsis'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('videos.index')->with('message', 'Video successfully added.');
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
        $categories = VideoCategory::all()->pluck('title', 'id');  
        return view('videos.edit',compact('video','categories'));
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
            'video_category_id'  => 'required',
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
    public function store_video(Request $request, $id)
    {
		
       // $uploaded = $request->file('file1');

        // validate
        $request->validate([
			'file1'   =>  'required|mimetypes:video/mp4,video/mpeg,video/quicktime,video/x-flv,video/x-matroska,video/avi,video/msvideo,video/x-msvideo',

        ]);
    
        // store
        $path = public_path().'/videos/' . $id;
        if(!File::isDirectory($path)){
           // Storage::disk('public')->put('/videos/' . $id . '/raw.file' , $video);
            Storage::disk('public')->putFileAs(
                '/videos/' . $id . '/raw', 
                $request->file('file1'), 'source.mp4'
            );
        }

        // update metadata in video table        
        $video = Video::find($id);
        $video->is_uploaded = 1;
        $video->filename =  $request->file('file1')->getClientOriginalName();
        $video->size =  Storage::disk('public')->size('/videos/' . $id . '/raw/source.mp4');
        $video->save();

        // converting to H264 AAC for streaming
        // send jobs
		Log::info("Send job $id to EncodeVideo");
        ConvertVideoForStreaming::dispatch($video);

        return redirect()->route('videos.index')
                         ->with('success','Video uploaded successfully');


    }        
}
