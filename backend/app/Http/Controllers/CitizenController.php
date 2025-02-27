<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use App\Http\Requests\CreateComplainRequest;

class CitizenController extends Controller
{
    public function MakeComplain(CreateComplainRequest $request)
    {
        $validated=$request->validated();

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
    public function ShowMyComplains()
    {
        
    }

}
