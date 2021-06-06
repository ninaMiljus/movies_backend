<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/home";

    public function authenticate(Request $request) {

        //pokupiti kredemcijale

        $credentials = $request->only(['email', 'password']);



        try {
             //pokusamo da se ulogujemo
            if(! $token = \JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch(JWTException $e) {
            //ako nismo prosli
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        //sve je proslo dobro i vracamo tokens

        return response()->json(compact('token'));


    }

    public function getUser() {
        return User::All();
    }

}

