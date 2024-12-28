<?php

use App\Models\Gallery;
use App\Models\Tender;
use App\Models\Timetable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/gallery', function () {
    $gallery = Gallery::all(); // Get all gallery items
    return response()->json($gallery); // Return as JSON response
});
Route::get('/tender', function () {
    $tender = Tender::all(); // Get all gallery items
    return response()->json($tender); // Return as JSON response
});
Route::get('/timetable', function () {
    $timetable = Timetable::all(); // Get all gallery items
    return response()->json($timetable); // Return as JSON response
});
