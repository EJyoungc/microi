<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/location/{deviceId}', function (Request $request, $deviceId) {

    // Append the new GPS data
    $locations = [
        'device_id' => $deviceId,
        'latitude' => (float) $request->latitude,
        'longitude' => (float) $request->longitude,
        'timestamp' => now()->toDateTimeString(),
    ];

    $jsonData = json_encode($locations);
    // Save the updated data back to the JSON file
    Storage::disk('public')->append('location-log.json', $jsonData);


    return response()->json([
        'message' => 'Location saved successfully!',
        'data' => $locations,
    ]);
});


Route::get('/test', function (Request $request) {
    return response()->json([
        'message' => 'Location saved successfully!',
    ]);
});

Route::get('/location/{deviceId}', function (Request $request, $deviceId) {

    // Append the new GPS data
    $locations = [
        'device_id' => $deviceId,
        'latitude' => (float) $request->latitude,
        'longitude' => (float) $request->longitude,
        'timestamp' => now()->toDateTimeString(),
    ];

    $jsonData = json_encode($locations);
    // Save the updated data back to the JSON file
    Storage::disk('public')->append('location-log.json', $jsonData);


    return response()->json([
        'message' => 'Location saved successfully!',
        'data' => $locations,
    ]);
});


Route::get('/location/{device_id}/{latitude}/{longitude}', function (Request $request, $latitude, $longitude) {
    // Validate the coordinates
    if (!is_numeric($latitude) || !is_numeric($longitude)) {
        return response()->json(['message' => 'Invalid coordinates provided.'], 422);
    }




    // Append the new GPS data
    $locations = [
        'device_id' => $request->device_id,
        'latitude' => (float) $request->latitude,
        'longitude' => (float) $request->longitude,
        'timestamp' => now()->toDateTimeString(),
    ];

    $jsonData = json_encode($locations);
    // Save the updated data back to the JSON file
    Storage::disk('public')->append('location-log.json', $jsonData);


    return response()->json([
        'message' => 'Location saved successfully!',
        'data' => $locations,
    ]);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/coordinates', function (Request $request) {
    $data = [
        'long' => $request->long,
        'lati' => $request->lati
    ];
    $jsonData = json_encode($data);
    // dd($jsonData);
    $storeData = Storage::disk('custom')->append('coordinates.json', $jsonData);
    dd($storeData);
});
