<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function show($email) {
        $client = new Client();
        $response = $client->get(env('CUSTOMER_SERVICE_URL') . '/api/customer/' . $email);
        return response($response->getBody(), $response->getStatusCode());
    }
    public function store(Request $request) {
        $client = new Client();
        $response = $client->post(env('CUSTOMER_SERVICE_URL') . '/api/customer', [
            'json' => $request->all()
        ]);
        return response($response->getBody(), $response->getStatusCode());
    }
    public function update(Request $request, $email) {
        $client = new Client();
        $response = $client->patch(env('CUSTOMER_SERVICE_URL') . '/api/customer/' . $email, [
            'json' => $request->all()
        ]);
        return response($response->getBody(), $response->getStatusCode());
    }
    public function destroy($email) {
        $client = new Client();
        $response = $client->delete(env('CUSTOMER_SERVICE_URL') . '/api/customer/' . $email);
        return response($response->getBody(), $response->getStatusCode());
    }
    
}
