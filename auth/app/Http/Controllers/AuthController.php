<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }
    public function register(Request $request)
    {
        $result = $this->userService->register($request->all());
        $data = $result->getData(true); // Get data as an associative array
        return response()->json($data, $result->status());
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request) {
        $result = $this->userService->login($request->only(['email', 'password']));
        if (isset($result['error'])) {
            return response()->json(['error' => $result['error']], $result['status']);
        }
        return response()->json($result['token'], $result['status']);
    }

    public function me()
    {
        $user = $this->userService->getAuthenticateUser();
        return response()->json($user);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function update(Request $request, $id)
    {
        return $this->userService->update($id, $request->all());
    }
    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        $token = $this->userService->refreshToken();

        return response()->json($this->userService->respondWithToken($token));
    }

    protected function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $this->userService->forgotPassword($request->email);

        return response()->json(['message' => 'Reset password link sent on your email id.']);
    }

    protected function resetPassword(Request $request, $token)
    {
        $request->validate([
            'password' => 'required|confirmed'
        ]);
        $data = $request->all();
        $data['token'] = $token;

        $this->userService->resetPassword($data);
        return response()->json(['message' => 'Password has been reset successfully.']);
    }
}
