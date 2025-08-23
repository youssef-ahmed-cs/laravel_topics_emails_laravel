<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        User::create($data);
        $token = $request->user()->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'User registered successfully',
            'user' => new UserResource($data),
            'access_token' => $token,
            'token_type' => 'Bearer Token',
        ]);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);
        $credentials = $request->only('email', 'password');
        if (!auth()->attempt($credentials))
            return response()->json(['message' => 'Invalid login details'], 401);

        $token = auth()->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'User logged in successfully',
            'user' => new UserResource(auth()->user()),
            'access_token' => $token,
            'token_type' => 'Bearer Token',
        ]);

    }

    function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'User logged out successfully']);
    }

    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    public function refreshToken(Request $request)
    {
        $token = $request->user()->createToken('auth_token')->plainTextToken;
        return response()->json([
            'message' => 'Token refreshed successfully',
            'access_token' => $token,
            'token_type' => 'Bearer Token',
        ]);
    }


}
