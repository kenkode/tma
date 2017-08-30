<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.profile',compact('user'));
    }

    public function update(Request $request){
        $user = User::find(Auth::user()->id);
        $user->name = $request->username;
        $user->email = $request->email;
        $user->update();

        return json_encode(["username"=>$user->name,"email"=>$user->email]);
        
        echo json_encode(array("username"=>$user->name,"email"=>$user->email));
        exit();
    }

    public function checkpassword(Request $request){
    	$oldpassword = $request->password;
    	$currentpassword = Auth::user()->password;
    	if (password_verify($oldpassword, $currentpassword)) {
          return 0;
    	}else{
    	  return 1;
    	}
    }

    public function password(Request $request){
        $user = User::find(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->update();
    }
}
