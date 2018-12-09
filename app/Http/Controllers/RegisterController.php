<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class RegisterController extends Controller
{
    public function create(){
        if(Auth::check()){
            return redirect()->to('/');
        } else{
            return view('auth.register');
        }
    }

    public function store(){
        $this->validate(request(),[
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'username' => 'required|unique:users'
        ]);

        $user = User::create(request(['email', 'password', 'username', 'fullname', 'address', 'phone']));

        $user->avatar = 'users/default.jpg';
        $user->save();

        Auth()->login($user);

        return redirect()->to('/');
    }
}
