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
    public function index($id=null)
    {
        //$videos = Video::latest()->paginate(50);
	    $categories = VideoCategory::all()->pluck('title', 'id');

        if($id){
            $videos =  Video::where([['video_category_id','=',$id]])
                       ->orderBy('ordering', 'asc')
                       ->paginate(50);
        }else{
            $videos =  Video::orderBy('ordering', 'asc')
                                       ->paginate(50);
        }

  
        return view('videos.index',compact('videos','categories','id'));
               //->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function category($id)
    {

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
            //'video_category_id'     => ['required', 'string'],
            'categories'            => ['required'],
            'title'                 => ['required', 'string', 'max:255'],
            'synopsis'              => ['required', 'string', 'max:255'],
            'description'           => ['required', 'string'],
            
            'ordering', 
            'title', 
            'synopsis', 
            'description', 
            'video_category_id',
            'genre',
            'casts',
            'director',
            'duration',
            'classification',
            'year_of_release',
            'start_date',
            'end_date'
        ]);


        $user = auth()->user();
        Video::create($request->all())->categories()->attach($request->input('categories'));


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
        $categories = $video->categories()->get();
        return view('videos.show',compact('video','categories'));
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
        $current_categories = $video->categories()->get();
        return view('videos.edit',compact('video','categories','current_categories'));
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
            'categories'            => 'required',
            'title'                 => 'required',
            'synopsis'              => 'required',
            'description'           => 'required',
        ]);

        $video->update($request->all( $request->input('categories') ));
        $video->categories()->sync( $request->input('categories') );
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
    
    
   /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */  
    
    public function image($id)
    {
  
        $video = Video::findOrFail($id);
       // dd($video);
        return view('videos.image.form',compact('video'));
    }     

    public function store_image(Request $request, $id)
    {
		
        // validate | accept jpg only
        $request->validate([
            'file1'   =>  'required|mimetypes:image/jpg,image/jpeg,image/png',
            'file2'   =>  'required|mimetypes:image/jpg,image/jpeg,image/png'
        ]);
    
     
        // store the asset
        Storage::disk('public')->putFileAs(
            '/videos/' . $id . '/image', 
            $request->file('file1'), 'image1.jpg');
        

        // store the asset
        Storage::disk('public')->putFileAs(
            '/videos/' . $id . '/image', 
            $request->file('file2'), 'image2.jpg');            

        return redirect()->route('videos.index')
                         ->with('success','Image uploaded successfully');
    }      
}
