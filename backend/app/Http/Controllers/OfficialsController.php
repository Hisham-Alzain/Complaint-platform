<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ResponseToComplaintRequest;

class OfficialsController extends Controller
{
    public function Login(LoginRequest $request)
    {
        $validated = $request->validated();
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
    public function ShowSectorComplaints()
    {
        // Get the authenticated official
        $official = Auth::user();

        // Ensure the user is an official
        if (!$official || $official->role !== 'official') {
            return response()->json([
                'message' => 'Unauthorized.',
            ], 403);
        }

        // Get the sector ID of the official
        $sectorId = $official->sector_id;

        // Retrieve complaints for the official's sector
        $complaints = Complaint::where('sector_id', $sectorId)
            ->with('user') // Load the user who made the complaint
            ->get();

        return response()->json([
            'message' => 'Complaints retrieved successfully.',
            'complaints' => $complaints,
        ], 200);
    }
    public function RespondToComplaint(ResponseToComplaintRequest $request) {}
}
