<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Http\Requests\CreateUserRequest; // Validation
use App\Http\Requests\UpdateUserRequest; // Validation

class UserController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(15);
        return view('users.index', compact('users'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
       return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        User::create([
            'name'      => $request->input('name'),
            'email'     => $request->input('email'),
            'password'  => Hash::make($request->input('password')),
        ]);
        return redirect()->route('users.index')->with('message', 'User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail(($id));
        return view('users.show')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$user = User::findOrFail(($id));
        return view('users.edit')->with('user',$user);
    }


    public function update(UpdateUserRequest $request, User $user)
    {
        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if( !empty( $request->input('new_password') ) ){
            $user->password =  Hash::make($request->input('new_password'));
        }
        $user->save();        
        return redirect()->route('users.index')->with('message', 'User successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        // check if id no equal to 1
        if($user->id != 1){
            $user->delete();
            return redirect()->route('users.index')->with('message', 'User successfully deleted.');
        } else {
            return redirect()->back()->with('error', 'Cannot delete root !');
        }
    }
}
