<?php

namespace App\Http\Controllers\BackEnd\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteUser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            
        ]);
     
        $user = SiteUser::where('email', $request->email)->first();
     
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
     
     $token=$user->createToken($user->email)->plainTextToken;
     return response([
        'user' => $user,
        'token' => $token,
        'token_type' => 'Bearer',
    ], 200);
    
        
    
    }

    public function register(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'email'=>'required|unique:site_users,email',
            'phonenumber'=>'required|unique:site_users,phonenumber',
            'password' => 'required|confirmed|min:8',

        ]);

        $user=SiteUser::create([
            'name'=>$request->username,
            'email'=>$request->email,
            'phonenumber'=>$request->phonenumber,
            'password'=>Hash::make($request->password),

        ]);
        
            $token=$user->createToken($request->email)->plainTextToken;
        
        return response([
            
            'token' => $token,
            'token_type' => 'Bearer',
        ], 201);
    }

    
}
