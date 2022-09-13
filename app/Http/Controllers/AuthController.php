<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8' 
        ]);

        if($validator->fails())
        {
            return response()->json($validator->errors());
        }

        $user = User::create($request->only(['name', 'email', 'password']));

        $token = $user->createToken('token')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token]);
    }

    public function login(Request $request)
    {
        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json(['message' => "Email or password are incorrect"], 401);
        }

        $user = User::where('email', $request->get('email'))->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        return response()->json(["message" => "Welcome {$user->name}", "token" => $token]);
    }
}
