<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use  App\User;

class UserController extends Controller
{
    public function getUser($userId) {
        $user = User::where('id', $userId)->first();
    	return view('user.profile', compact('user'));
    }
}
