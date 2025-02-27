<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\CreateComplainRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class CitizenController extends Controller
{
    public function Register(RegisterRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        $token = $user->createToken('AuthToken')->accessToken;

        return response()->json([
            'message' => 'user created successfully',
            'user' => $user,
            'token' => $token,
        ]);
    }
    public function MakeComplain(CreateComplainRequest $request)
    {
        $validated = $request->validated();

        // Create the complaint
        $complaint = Complaint::create([
            'user_id' => $validated['user_id'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'sector_id' => $validated['sector_id'],
            'status' => 'pending',
        ]);

        // Return a success response
        return response()->json([
            'message' => 'Complaint submitted successfully!',
            'complaint_id' => $complaint->id,
        ], 201);
    }
    public function ShowMyComplains(Request $request)
    {
        $user = $request->user();
        $complaints = $user->complaints();
        return response()->json([
            'message' => 'Complaint retreved successfully!',
            'data' => $complaints,
        ], 200);
    }
}
