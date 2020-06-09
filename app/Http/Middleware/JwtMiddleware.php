<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\User;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use Illuminate\Http\Request;

class JwtMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        //$token = $request->get('token');
        $header_author = $request->headers->get('Authorization') ?? null;
        $header_author_arr = explode('Bearer ', $header_author);
        $token = $header_author_arr[1] ?? '';

        if(!$token) {
            // Unauthorized response if token not there
            return response()->json([
                "message" => 'Token not provided.',
                "errors" => [
                    "token" => "Token not provided.",
                ],
                "status_code" => 401
            ], 401);
        }

        try {
            $credentials = JWT::decode($token, env('JWT_SECRET'), ['HS256']);
        } catch(ExpiredException $e) {
            return response()->json([
                "message" => "Provided token is expired.",
                "errors" => [
                    "token" => "Provided token is expired.",
                ],
                "status_code" => 400
            ], 400);
        } catch(Exception $e) {
            return response()->json([
                "message" => "An error while decoding token.",
                "errors" => [
                    "token" => "An error while decoding token.",
                ],
                "status_code" => 400
            ], 400);
        }

        $user = User::find($credentials->sub);

        // Now let's put the user in the request class so that you can grab it from there
        $request->auth = $user;
        $request->token = $token;

        return $next($request);
    }
}
