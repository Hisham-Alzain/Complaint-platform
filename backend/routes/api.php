<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CitizenController;
use App\Http\Controllers\OfficialsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::post('/login',[OfficialsController::class,'Login']);
Route::post('/register',[CitizenController::class,'Register']);
Route::middleware(['auth:api', 'role:user'])->group(function () {
    Route::post('/make-complaint', [CitizenController::class, 'MakeComplain']);
    Route::get('/my-complaints', [CitizenController::class, 'ShowMyComplains']);
});

Route::middleware(['auth:api', 'role:official'])->group(function () {
    Route::post('/respond-to-complaint/{complaintId}', [OfficialsController::class, 'RespondToComplaint']);
    Route::get('/sector-complaints', [OfficialsController::class, 'ShowSectorComplaints']);
});