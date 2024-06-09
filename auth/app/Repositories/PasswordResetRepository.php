<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PasswordResetRepository
{
    public function createToken($email, $token)
    {
        $expiry = Carbon::now()->addMinutes(60);
        return DB::table('password_reset_tokens')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
    }
    public function getToken($token)
    {
        return DB::table('password_reset_tokens')->where('token', $token)->first();
    }
    public function deleteToken($token)
    {
        return DB::table('password_reset_tokens')->where('token', $token)->delete();
    }
}
