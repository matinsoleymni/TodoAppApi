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

        session()->flash("message", "توکن با موفقیت به ایمیل شما ارسال شد");
        return redirect()->route("welcome");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $provider = Provider::where("email", $request->email)->first();

        if (!$provider || !Hash::check($request->password, $provider->password)) {
            return back()->withErrors([
                'email' => 'ایمیل یا رمز عبور اشتباه است',
            ]);
        }

        $provider->update([
            "token" => Str::random(30)
        ]);

        Mail::send(new SendToken(
            token: $provider->token,
            name: $provider->name,
            email: $provider->email
        ));

        return redirect()->route('welcome')->with('message', 'با موفقیت وارد شدید ، توکن به ایمیل شما ارسال شد');
    }
}
