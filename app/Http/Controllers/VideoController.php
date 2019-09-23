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
        $videos = Video::all();
        return view('videos.index', compact('videos'));
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

        Video::create([
            'title'         => $request->input('title'),
            'synopsis'      => $request->input('synopsis'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('videos.index')->with('message', 'User successfully added.');
    }
    
}
