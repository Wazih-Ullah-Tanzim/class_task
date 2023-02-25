<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
{
    public function user_dashboard(){
        return view('website.pages.dashboard');
    }
    public function allUsers(){
        $users = User::all();
        return view('admin.pages.users',compact('users'));
    }

    public function approve($userId){
        $user = User::find($userId);
        $user->is_approved=1;
        if($user->save()){
            return redirect()->back()->with('msg','Approved');
        }

    }


}
