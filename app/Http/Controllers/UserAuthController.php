<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    //page 
    public function page()
    {
        return view('auth.register');
    }

    public function loginpage()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:2', 'max:50'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8', 'max:16'],
        ]);


        $user= User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            
            $new_user = User::where('email',$request->email)->first();
            $token = JWTAuth::fromUser($new_user);

            User::where("id", $new_user->id)->update(['jwt_token' => $token]);
    
            return redirect('/user/login');

    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email'],
            'password' => ['required', 'min:8', 'max:16'],
        ]);


        if (Auth::guard('web')->attempt($data)) {
            $user = Auth::guard('web')->user();
            Auth::guard('web')->login($user);
            $token = JWTAuth::fromUser($user);
            User::where("id", $user->id)->update(['jwt_token' => $token]);
            return redirect('/home');
        } else {
            return back()->withErrors(['status' => 'Try again, your credentials are invalid.']);
        }
    }
}
