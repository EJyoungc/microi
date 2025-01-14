<?php

namespace App\Http\Livewire\Pages\Vehicles;

use App\Models\DeviceVehicle;
use Livewire\Component;

class VehicleLivewire extends Component
{
    public $vehicle;
    public $vehicle_id;
    public $vehicle_make;
    public $vehicle_conditon = 50;

    public function mount($id)
    {
        $this->vehicle_id = $id;
    }
    public function render()
    {
        $this->vehicle_make = DeviceVehicle::where('id', $this->vehicle_id)->get()->value('vehicle_make');
        $this->vehicle = DeviceVehicle::find($this->vehicle_id);
        return view('livewire.pages.vehicles.vehicle-livewire');
    }
}
