<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Contracts\Providers\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();
        if (!$user) {
            throw new \App\Exceptions\NotFoundException('User not found');
        }

        if (!$user->hasVerifiedEmail()) {
            throw new \App\Exceptions\EmailNotVerifiedException();
        }

        if (! $token = JWTAuth::attempt($credentials)) {
            throw new \App\Exceptions\UnauthorizedException('Invalid credentials');
        }

        return response()->json([
            'token_type' => 'bearer',
            'access_token' => $token,
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ]);
    }

    public function refresh()
    {
        try {
            return response()->json([
                'token_type' => 'bearer',
                'access_token' => JWTAuth::refresh(),
                'expires_in' => JWTAuth::factory()->getTTL() * 60,
            ]);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['error' => 'Invalid refresh token'], 401);
        }
    }

    public function register(Request $request)
    {
        //
    }

    public function me()
    {
        return response()->json(Auth::guard('api')->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
