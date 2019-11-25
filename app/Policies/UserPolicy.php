<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function access(User $user)
    {
        if($user->level == 'admin'){}
    }
	
	public function admin_access(User $user)
    {
        // return TRUE | FALSE 
        return $user->user_level == 'admin'; // admin | member | editor
    }

    // create is user defined function
    // User Model is referring to who is 
    // currently logged_in using User Model
    public function access_profile(User $user){
        return true;
    }
}
