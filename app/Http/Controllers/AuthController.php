<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
            "password" => ['required' , 'min:8'],
        ]);

        if(!Auth::attempt($data))
        {
            return response()->json(['message' => 'user not found']);
        }

        $user = Auth::user();
        $user->tokens()->delete();

        $token = $user->createToken('web')->plainTextToken;

        return response()->json(['user' => $user , 'token' => $token]);
    }

    public function register(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => ['required' , 'min:8'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('web')->plainTextToken;

        return response()->json(['user' => $user , 'token' => $token]);
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json(['message' => 'logout successfully']);
    }

    public function me(Request $request)
    {
        $user = $request->user();
        return response()->json(['user' => $user]);
    }
}
