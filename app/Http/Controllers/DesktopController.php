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

class DesktopController extends Controller
{
    function index()
    {
        // list all categories
        $categories = VideoCategory::all();
        return view('desktop.index')->with(compact('categories'));
    }

    function play(Video $video)
    {
        //dd($video);
        return view('desktop.play',compact('video'));
    }
}
