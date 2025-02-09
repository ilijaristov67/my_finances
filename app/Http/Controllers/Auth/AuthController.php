<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserLogoutRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request): UserResource
    {
        $user = User::create($request->validated());
        $token = $user->createToken('api-access')->plainTextToken;
        return UserResource::make($user)->additional([
            'token'=> $token
        ]);
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password))
        {
            return response()->json([
                'message' => 'Wrong credentials',
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('api-access')->plainTextToken;

        return UserResource::make($user)
            ->additional([
                'token' => $token
            ])->response();
    }

    public function logout(UserLogoutRequest $request): JsonResponse
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
