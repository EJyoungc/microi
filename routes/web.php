<?php

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
