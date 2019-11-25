<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; // importing User Model from App/User.php

use App\Http\Requests\StoreCreateUser; // Validation rules
use App\Http\Requests\StoreUpdateUser; // Validation rules

use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'ASC')->paginate(15);
        return view('users.index')->with(compact('users'));
    }

    public function create()
    {      
        $levels = User::levels();
        return view('users.create')->with(compact('levels'));
    }

    public function store(StoreCreateUser $request)
    {
        // validation passed
        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'user_level'    => $request->user_level,
            'password'      => bcrypt($request->password),
        ]);

        return redirect( route('users.index') )
               ->with('status', 'User successfully created!');

    }

    public function edit(User $user)
    {
        $levels = User::levels();
        return view('users.edit')->with( compact('user','levels') );
    }

    public function update(StoreUpdateUser $request, User $user)
    {
        //User::whereId($id)->update([
        $user->update([
            'name'          => $request->name,
            'email'         => $request->email,
            'user_level'    => $request->user_level,
            'password'      => bcrypt($request->password),
        ]);

        return redirect( route('users.index') )
        ->with('status', 'User '.$request->name.' successfully updated!');   
    }

    public function delete(User $user){
        if($user->id == 1)
        {
            return redirect( route('users.index') )
            ->with('status', 'User '.$user->name.' can\'t be deleted!');

        } else {
            $user->delete();
            return redirect( route('users.index') )
            ->with('status', 'User '.$user->name.' successfully deleted !');
        }
    }
            
    public function search(Request $request){
        
        $q = $request->get('query');
        $users = User::where('name','LIKE','%'.$q.'%')
                        ->orWhere('email','LIKE','%'.$q.'%')
                        ->orderBy('name', 'ASC')
                        ->paginate(15);
        return view('users.index')->with(compact('users'));
    }
}
