<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProviderController extends Controller
{
    public function register(Request $request){
        $request->validate([
            "name" => "required|min:2",
            "email" => "required|email|unique:providers,email",
            "password" => "required|min:8"
        ]);

        $provider = Provider::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "token" => Str::random(30)
        ]);
        
        Mail::send(new SendToken(
            token: $provider->token,
            name: $provider->name,
            email: $provider->email
        ));

        return redirect()->route("welcome");
    }

    public function sendToken(Request $request)
    {
        // ... کد قبلی ...
        
        Mail::queue(new SendToken($token, $user->name));
        
        return response()->json(['message' => 'توکن با موفقیت ارسال شد']);
    }
}
