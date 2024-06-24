<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use PHPOpenSourceSaver\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/auth/login', [
            'form_params' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
    public function register(Request $request)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/auth/register', [
            'form_params' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
    public function logout(Request $request)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/auth/logout', [
            'headers' => [
                'Authorization' => 'Bearer ' . $request->bearerToken()
            ]
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
    public function refresh(Request $request)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/auth/refresh', [
            'headers' => [
                'Authorization' => 'Bearer ' . $request->bearerToken()
            ]
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }

    // public function validateToken(Request $request)
    // {
    //     $client = new Client();
    //     $response = $client->get(env('AUTH_SERVICE_URL') . '/api/verify-token', [
    //         'headers' => [
    //             'Authorization' => 'Bearer ' . $request->bearerToken()
    //         ]
    //     ]);
    //     return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    // }

    public function update(Request $request, $id)
    {
        $client = new Client();
        $response = $client->patch(env('AUTH_SERVICE_URL') . '/api/auth/update/' . $id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $request->bearerToken()
            ],
            'form_params' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
    public function forgotPassword(Request $request)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/forgot-password', [
            'form_params' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
    public function resetPassword(Request $request, $token)
    {
        $client = new Client();
        $response = $client->post(env('AUTH_SERVICE_URL') . '/api/password/reset/' . $token, [
            'form_params' => $request->all()
        ]);

        return response()->json(json_decode($response->getBody(), true), $response->getStatusCode());
    }
}
