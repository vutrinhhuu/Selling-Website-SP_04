<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\User;

use Auth;
use Validator;

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

    public function edit($userId) {
        if (Auth::check()){
            $user = Auth::user();
            if ($user->id == $userId){
                return view('user.edit', compact('user'));
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
                if($user->username != request('username')){
                    $this->validate(request(), [
                        'username' => 'required|unique:users'
                    ]);

                    $user->username = request('username');
                }

                if(request('password')){
                    $this->validate(request(), [
                        'password' => ['required', 
                                        'min:8', 
                                        'confirmed'],
                        'password_confirmation'=>'sometimes|required_with:password'
                    ]);

                    $user->password = request('password');
                }

                // Upload image
                if(request('avatar')){
                    $rules = [ 'upload image' => 'image|max:1024' ]; 
                    $posts = [ 'upload image' => request()->file('image') ];
                    
                    // Validator để kiểm tra
                    $valid = Validator::make($posts, $rules);
                    
                    // Kiểm tra nếu có lỗi
                    if ($valid->fails()) {
                        return redirect()->back()->withErrors($valid)->withInput();
                    }
                    else {
                        $fileExtension = request('avatar')->getClientOriginalExtension();
                        $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;

                        $uploadPath = public_path('/images/users');

                        unlink(public_path('/images/'.$user->avatar));
                        request('avatar')->move($uploadPath, $fileName);

                        $user->avatar = "users/".$fileName;
                    }
                }

                $user->fullname = request('fullname');
                $user->phone = request('phone');
                $user->address = request('address');
                $user->save();

                return redirect()->route('user', $user->id);
            }
        }
        return redirect()->route('home');
    }

}
