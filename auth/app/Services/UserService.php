<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Repositories\PasswordResetRepository;
use Illuminate\Support\Facades\Mail;
use App\Mail\PasswordResetMail;

class UserService
{
    // constructor injection
    protected $userRepository;
    protected $passwordResetRepository;

    public function __construct(UserRepository $userRepository, PasswordResetRepository $passwordResetRepository)
    {
        $this->userRepository = $userRepository;
        $this->passwordResetRepository = $passwordResetRepository;
    }

    public function register($data)
    {
        $validator = Validator::make($data, [
            'username' => 'required|max:20|unique:users',
            'firstname' => 'required|max:32',
            'lastname' => 'required|max:32',
            'email' => 'required|email|unique:users|max:96',
            'password' => 'required|confirmed|min:8|max:255',
            'user_group_id' => '',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $data['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        $data['ip_address'] = $_SERVER['REMOTE_ADDR'];
        if (!isset($data['user_group_id'])) {
            $data['user_group_id'] = 1;
        }
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->save($data);
        return response()->json($user, 201);
    }


    public function update($id, $data)
    {
        $validator = Validator::make($data, [
            'username' => 'max:20|unique:users',
            'firstname' => 'max:32',
            'lastname' => 'max:32',
            'image' => ''
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = $this->userRepository->update($id, $data);
        return response()->json($user, 200);
    }

    public function login($credential) {
        $token = auth()->attempt($credential);
        if (!$token) {
            return ['error' => 'Unauthorized', 'status' => 401];
        }
        return ['token' => $this->respondWithToken($token), 'status' => 200];
    }

    public function getAuthenticateUser()
    {
        if (!auth()->user()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return auth()->user();
    }

    public function refreshToken()
    {
        return auth()->refresh();
    }

    public function forgotPassword($email) {
        $user = $this->userRepository->findByEmail($email);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }
        $token = Str::random(60);
        $this->passwordResetRepository->createToken($email, $token);
        Mail::to($email)->send(new PasswordResetMail($token));
        return response()->json(['message' => 'Password reset link has been sent to your email.'], 200);
    }

    public function resetPassword($data) {
        $passwordReset = $this->passwordResetRepository->getToken($data['token']);
        if (!$passwordReset) {
            return response()->json(['error' => 'Invalid token'], 404);
        }
        $user = $this->userRepository->findByEmail($passwordReset->email);
        $user->password = Hash::make($data['password']);
        $user->save();
        $this->passwordResetRepository->deleteToken($data['token']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60 * 24 * 30
        ]);
    }
    public function verifyToken($token) {
        try {
            $user = auth()->setToken($token)->user();
            if ($user) {
                return $user;
            } else {
                throw new \Exception('Unauthorized');
            }
        } catch (\Exception $e) {
            return ['error' => 'Unauthorized'];
        }
    }


}
