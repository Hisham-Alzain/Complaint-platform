<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class OfficialsController extends Controller
{
    public function Login(LoginRequest $request)
    {
        $validated=$request->validated();
        // Attempt to authenticate the user
        if (!Auth::attempt($validated)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401); // Unauthorized
        }

        // Get the authenticated user
        $user = Auth::user();

        $token = $user->createToken('AuthToken')->accessToken;

        // Return the response
        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    
}
