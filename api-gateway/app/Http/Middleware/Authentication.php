<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $client = new Client();
        $response = $client->get(env('AUTH_SERVICE_URL') . '/api/verify-token', [
            'headers' => [
                'Authorization' => 'Bearer ' . $request->bearerToken()
            ]
        ]);
        if ($response->getStatusCode() !== 200) {
            return response($response->getBody(), $response->getStatusCode());
        }
        return $next($request);
    }
}
