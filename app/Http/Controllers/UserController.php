<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\User;

use Auth;

class UserController extends Controller
{
    public function getUser($userId) {
        if (Auth::check()){
            $user = Auth::user();
            if ($user->id == $userId){
                return view('user.profile', compact('user'));
            }
            else {
                return redirect()->route('home');
            }
        }
        else {
            return redirect()->route('home');
        }
    }


    public function update($userId){ 
        if(Auth::check()){
            $user = Auth::user();
            if($user->id == $userId){
                $this->validate(request(), [
                    'username' => 'required',
                     'password' => 'required|min:6|confirmed'
                    
                ]);
                $user->username = request('username');
                $user->password = bcrypt(request('password'));
                $user->save();
               
            }
        }
         return back();
    }
}
