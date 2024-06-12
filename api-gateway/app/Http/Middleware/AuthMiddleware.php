<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use GuzzleHttp\Client;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $client = new Client();
        $response = $client->get(env('AUTH_SERVICE_URL') . '/api/auth/verify-token', [
            'headers' => [
                'Authorization' => 'Bearer ' . $token
            ]
            ]);
            if ($response->getStatusCode() !== 200) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }

            return $next($request);
    }
}
