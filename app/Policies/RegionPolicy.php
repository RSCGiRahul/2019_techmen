<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Auth;
class RegionPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        // dd('dfd');
    }

    public function create(User $id){
        if(Auth::user()->firstRole()->id == User::Admin_Level) {
            return true;
        }
    }


    public function update(){
        if(Auth::user()->firstRole()->id == User::Admin_Level) {
            return true;
        }
    }

    public function delete(){
        if(Auth::user()->firstRole()->id == User::Admin_Level) {
            return true;
        }
    }
}
