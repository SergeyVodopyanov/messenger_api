<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Models\User;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\Auth\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request): JsonResponse
    {
        $request->validated();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ]);

        return response()->json([
            ...$this->getTokenData($token),
            'user' => $user
        ], 201);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $request->validated();

        if (! $token = Auth::attempt([
            'email' => $request['email'],
            'password' => $request['password']
        ])) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json($this->getTokenData($token), 200);
    }

    public function me(): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(Auth::user());
    }

    public function logout(): JsonResponse
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        Auth::logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function getTokenData($token): array
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ];
    }
}
