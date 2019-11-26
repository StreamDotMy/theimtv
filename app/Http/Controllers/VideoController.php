<?php
namespace App\Http\Controllers;

use App\Video;
use App\VideoCategory;
use App\Genre;
use App\GenreVideo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\VideoStoreRequest;


use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use App\Jobs\ConvertVideoForStreaming;
use Image;


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
           $by_category = VideoCategory::find($id);
           //$by_category = VideoCategory::whereIn('id', array($id) )->paginate(50);

           //dd($by_category);
           return view('videos.index',compact('by_category','categories','id'));
        }else{
            $videos =  Video::orderBy('ordering', 'asc')->paginate(50);
            return view('videos.index',compact('videos','categories','id'));
        }      
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
       $genres      = Genre::all()->pluck('title', 'id');  
       $categories  = VideoCategory::all()->pluck('title', 'id');  
       $classifications = Video::classifications();
       return view('videos.create')->with( compact('categories','genres','classifications'));
    }  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VideoStoreRequest $request)
    {
        $user = auth()->user();
        $create = Video::create($request->all());
            //->genres()->attach($request->input('genres'));
           // ->genres()->attach( $request->input('categories'));

        $id = $create->id;
        $video = Video::find($id);
        $video->genres()->attach( $request->input('genres') ); 
        $video->categories()->attach( $request->input('categories') ); 

        // create master directory
        $path = storage_path('/app/public/videos/' . $id);
        File::makeDirectory($path, $mode = 0777, true, true);

        // create original video directory
        $path = storage_path('/app/public/videos/' . $id . '/raw/');
        File::makeDirectory($path, $mode = 0777, true, true);

        // create images directory
        $path = storage_path('/app/public/videos/' . $id . '/images/');
        File::makeDirectory($path, $mode = 0777, true, true);

        // create videos directory
        $path = storage_path('/app/public/videos/' . $id . '/mp4/');
        File::makeDirectory($path, $mode = 0777, true, true);

        // create hls directory
        $path = storage_path('/app/public/videos/' . $id . '/hls/');
        File::makeDirectory($path, $mode = 0777, true, true);

        // create scrubber image directory
        $path = storage_path('/app/public/videos/' . $id . '/thumbnails/');
        File::makeDirectory($path, $mode = 0777, true, true);

        //return redirect()->route('videos.index')->with('message', 'Video successfully added.');
        return redirect()->route('videos.upload',$video)
        ->with('success','Upload video');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */  
    
    public function show(Video $video)
    {
        //$categories = $video->categories()->get();
        //$genres = $video->genres()->get();
        $categories = VideoCategory::all()->pluck('title', 'id');  
        $genres     = Genre::all()->pluck('title', 'id');
        $current_categories = $video->categories()->get();
        $current_genres     = $video->genres()->get();
        $classifications = Video::classifications();
        return view('videos.show',compact('video','categories','genres','current_categories','current_genres','classifications'));

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
        $genres     = Genre::all()->pluck('title', 'id');
        $current_categories = $video->categories()->get();
        $current_genres     = $video->genres()->get();
        $classifications = Video::classifications();
        //dd($current_genres);
        return view('videos.edit',compact('video','categories','genres','current_categories','current_genres','classifications'));
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
            'genres'                => 'required',
            'title'                 => 'required',
            'synopsis'              => 'required',
            'description'           => 'required',
        ]);

        $video->update($request->all());
        $video->categories()->sync( $request->input('categories') );
        $video->genres()->sync( $request->input('genres') );
        return redirect()->route('videos.show',$video)
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
        if ($video->delete() )
        {
            $path = storage_path('/app/public/videos/' . $video->id);
            if( File::isDirectory($path) )
            {
                File::deleteDirectory($path);
            }
        }
  
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
    
        // storage path
        $path = storage_path('/app/public/videos/' . $id . '/raw/');

        // move to storage path
        $file =  $request->file('file1');
     
        $file->move($path , 'source.mp4' );

        // update metadata in video table        
        $video = Video::find($id);
        $video->is_uploaded = 1;
        $video->filename =  $request->file('file1')->getClientOriginalName();
        
        $video->save();

        // converting to H264 AAC for streaming
        // send jobs
		Log::info("Send job $id to EncodeVideo");
        ConvertVideoForStreaming::dispatch($video);

        //return redirect()->route('videos.index')
        //                 ->with('success','Video uploaded successfully');
        return redirect()->route('videos.show',$video)
        ->with('success','Video uploaded and being processed');


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
       
        if($request->hasFile('file1'))
        {
            // validate | accept jpg only
            $request->validate([
                'file1'   =>  'mimetypes:image/jpg,image/jpeg,image/png',
            ]);

            // resize the image
            $originalImage  = $request->file('file1');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->resize(186,265);
            
            // path
            $path = storage_path('/app/public/videos/' . $id . '/images/');
            // save the image jpg format defined by third parameter
            $thumbnailImage->save( $path . 'image1.jpg' , 100, 'jpg');

        }
            
        if($request->hasFile('file2'))
        {

            // validate | accept jpg only
            $request->validate([
                'file2'   =>  'mimetypes:image/jpg,image/jpeg,image/png',
            ]);            

            // resize the image
            $originalImage  = $request->file('file2');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->resize(414,233);
            
            // path
            $path = storage_path('/app/public/videos/' . $id . '/images/');

            // save the image jpg format defined by third parameter
            $thumbnailImage->save( $path . 'image2.jpg' , 100, 'jpg');
            
        } 

        if($request->hasFile('file3'))
        {            
            // validate | accept jpg only
            $request->validate([
                'file3'   =>  'mimetypes:image/jpg,image/jpeg,image/png',
            ]);            

            // resize the image
            $originalImage  = $request->file('file3');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->resize(1920,1080);
            
            // path
            $path = storage_path('/app/public/videos/' . $id . '/images/');

            // save the image jpg format defined by third parameter
            $thumbnailImage->save( $path . 'image3.jpg' , 100, 'jpg' );          
        }         
    

        return redirect()->route('videos.image',$id)
                         ->with('success','Image uploaded successfully');
    }      
}
