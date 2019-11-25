<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Requests\StoreChangePassword;
use Illuminate\Support\Facades\Auth;
use Image;


class ProfileController extends Controller
{


    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $profile = Profile::where( 'user_id', '=', Auth::user()->id )->first();
    
        if(!$profile){
            return redirect( route('profile.create') );
        }
    
        // display the profile for loggedin user
        $profile = User::find( Auth::user()->id )->profile;
        return view('profiles.show')->with(compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
        $profile = Profile::where('user_id', '=' , Auth::user()->id )->first();

        if( $profile )
        {
            return redirect( route('profile.edit') );
        }
        return view('profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileStoreRequest $request)
    {

        $originalImage  = $request->file('avatar');
        $thumbnailImage = Image::make($originalImage);
        
        $thumbnailPath  = public_path().'/thumbnail/';
        $thumbnailImage->resize(150,150);
        
        // save the image jpg format defined by third parameter
        $thumbnailImage->save( $thumbnailPath .  Auth::user()->id . '.jpg' , 100, 'jpg');


        // validation passed
        Profile::create([
            'address'   => $request->address,
            'user_id'   => Auth::user()->id,
        ]);

        return redirect( route('profile.show') )
               ->with('status', 'Profile updated!');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        $profile = User::find( Auth::user()->id )->profile;
        return view('profiles.edit')->with(compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileStoreRequest $request)
    {
        
        $originalImage  = $request->file('avatar');
        $thumbnailImage = Image::make($originalImage);
        
        $thumbnailPath  = public_path().'/thumbnail/';
        $originalPath   = public_path().'/images/';
        
        $thumbnailImage->resize(150,150);
        // save the image jpg format defined by third parameter
        $thumbnailImage->save( $thumbnailPath .  Auth::user()->id . '.jpg' , 100, 'jpg');


        Profile::where('user_id',  Auth::user()->id )
            ->update([
                'address' => $request->address,
            ]);
            return redirect( route('profile.show') )
            ->with('status', 'Profile updated!');
    }


    
    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function change_password()
    {
        return view('profiles.change_password');
    }

    public function update_password(StoreChangePassword $request)
    {
        //dd($request->password);
        User::where('id','=', Auth::user()->id )
            ->update([
                'password'  => bcrypt($request->password),
            ]);

            return redirect( route('profile.change_password') )
            ->with('status', 'Password updated!');
    }    
}
