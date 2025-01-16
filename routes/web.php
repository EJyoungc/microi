<?php
use Illuminate\Http\Request;

use App\Http\Controllers\LandingController;
use App\Http\Livewire\Pages\Devices\DeviceLivewire;
use App\Http\Livewire\Pages\Dashboard\DashboardLivewire;
use App\Http\Livewire\Pages\Devices\AssignLivewire;
use App\Http\Livewire\Pages\Devices\DevicesLivewire;
use App\Http\Livewire\Pages\Devices\PublicDeviceLivewire;
use App\Http\Livewire\Pages\Invites\InvitesLivewire;
use App\Http\Livewire\Pages\Location\LocationHistoryLivewire;
use App\Http\Livewire\Pages\Organisations\OrganisationsLivewire;
use App\Http\Livewire\Pages\Organisations\OrganisationLivewire;
use App\Http\Livewire\Pages\Organisations\OrgUserLivewire;
use App\Http\Livewire\Pages\Profile\ProfileLivewire;
use App\Http\Livewire\Pages\Users\UsersLivewire;
use App\Http\Livewire\Pages\Vehicles\AllVehiclesLivewire;
use App\Http\Livewire\Pages\Vehicles\VehicleLivewire;
use App\Http\Livewire\Pages\Vehicles\VehiclesLivewire;
use App\Http\Livewire\Pages\Pansika\PansikaLivewire;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get(
    '/',
    [LandingController::class, 'index']
)->name('landing');


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
    ], 200);
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



 Route::get('/pansika', PansikaLivewire::class)->name('pansika');

Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::middleware(['validateRole'])->group(function () {
        Route::get('/users', UsersLivewire::class)->name('users');
        Route::get('/devices', DevicesLivewire::class)->name('devices');
        Route::get('/devices/device/assign/{id}', AssignLivewire::class)->name('assign');
        Route::get('/devices/device/location/{id}', LocationHistoryLivewire::class)->name('location.history');
        Route::get('/devices/device/{id}', DeviceLivewire::class)->name('device');
        Route::get('/devices/public/device/{id}', PublicDeviceLivewire::class)->name('public.device');
        // Route::get('/organisations', OrganisationsLivewire::class)->name('organisations');
        Route::get('/organisations/organisation/{id}', OrganisationLivewire::class)->name('organisation');
        Route::get('/organisations/organisation/{id}/users', OrgUserLivewire::class)->name('organisation.users');
        Route::get('/home/vehicles', AllVehiclesLivewire::class)->name('all.vehicles');
        Route::get('/organisation/{id}/vehicles', VehiclesLivewire::class)->name('vehicles');
        Route::get('organisation/vehicles/vehicle/{id}', VehicleLivewire::class)->name('vehicle');
        Route::get('home/invites', InvitesLivewire::class)->name('invites');

    });
    Route::get('/home', DashboardLivewire::class)->name('home');
    Route::get('/profile', ProfileLivewire::class)->name('profile');
    Route::get('/organisations', OrganisationsLivewire::class)->name('organisations');
    Route::get('/organisations/organisation/{id}', OrganisationLivewire::class)->name('organisation');
    Route::get('/organisations/organisation/{id}/users', OrgUserLivewire::class)->name('organisation.users');
    Route::get('/home/vehicles', AllVehiclesLivewire::class)->name('all.vehicles');
    Route::get('/organisation/{id}/vehicles', VehiclesLivewire::class)->name('vehicles');
    Route::get('organisation/vehicles/vehicle/{id}', VehicleLivewire::class)->name('vehicle');
    Route::get('home/invites', InvitesLivewire::class)->name('invites');
});


// Route::get()
