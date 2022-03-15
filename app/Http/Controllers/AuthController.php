<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    // this function to for candeid to register .....................................................................
    public  function signup(request $request)
    {
        if (User::create(array('name' => $request->name, 'email' => $request->email, 'phone' => $request->phone, 'cv' => $request->cv, 'password' => bcrypt($request->password))))
            return response(array('message' => 'signup successfully', 'code' => 200));
        else return response(array('message' => 'something wrong', 'code' => 403));
    }



    //This fuction for candidt ro login ................................................................
    public function login(request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // $user = Auth::user();
            $token = Auth::user()->createToken('token')->plainTextToken;
            return response(array('message' => 'login successfully', 'user' => Auth::user(), 'token' => $token, 'code' => 200));
        } else
            return response(array('message' => 'invalid credentials', 'code' => 400));
    }
}
