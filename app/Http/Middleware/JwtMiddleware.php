<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Throwable;

class JwtMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'message' => 'Token not provided',
            ], 401);
        }

        $secret = config('app.jwt_secret');

        if (empty($secret)) {
            return response()->json([
                'message' => 'Server authentication configuration error',
            ], 500);
        }

        try {
            $decoded = JWT::decode(
                $token,
                new Key($secret, 'HS256')
            );

            if (!isset($decoded->sub)) {
                return response()->json([
                    'message' => 'Invalid token payload',
                ], 401);
            }

            $request->attributes->set('user_id', $decoded->sub);

        } catch (Throwable $e) {
            report($e);

            return response()->json([
                'message' => 'Invalid or expired token',
            ], 401);
        }

        return $next($request);
    }
}
 