<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Provider;
class CheckProvider
{
    public function handle(Request $request, Closure $next): Response
    {
        $provider = Provider::where("token", $request->header("Provider"))->first();
        if(!$provider){
            return response()->json([
                "message" => "Permission denied - https://todo.zmat24.ir/"
            ], 403);
        }

        return $next($request);
    }
}
