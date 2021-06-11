<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Models\User;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = "/home";

    public function authenticate(Request $request) {

        $credentials = $request->only(['email', 'password']);

        try {
            if(! $token = \JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch(JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email',$request->email)->get();

        return response()->json(compact(['token','user']));
    }

    public function getUser() {
        return User::All();
    }

    public function register(RegisterRequest $request){

        info($request);
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
         User::create($data);
    }
}

