<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // dd(env('JWT_SECRET'));

         try {
            $token = $request->bearerToken();
            //    dd($token);
            if (!$token) {
                return response()->json(['message' => 'Token not provided'], 401);
            }

            $decoded = JWT::decode($token, new Key(env('JWT_SECRET'), 'HS256'));

            // تخزين user_id داخل request باش تستعملو فـ controller
            $request->user_id = $decoded->sub;

        } catch (Exception $e) {
            return response()->json(['message' => 'Invalid token'], 401);
        }

        return $next($request);
    }
    
}
