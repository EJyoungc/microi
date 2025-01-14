<?php

namespace App\Http\Livewire\Pages\Vehicles;

use Illuminate\Support\Facades\Auth;
use App\Models\Device;
use App\Models\DeviceVehicle;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class VehiclesLivewire extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $add_car = false;
    public $title = 'add';
    public $car_name;
    public $car_model;
    public $org_id;
    public $car_id;


    public function mount($id)
    {
        $this->org_id = $id;
    }
    public function open_modal($id = null)
    {


        if ($id == null) {
            $this->title = "add";
        } else {
            $this->title = "edit";
            $this->car_id = $id;
            $vehicle = DeviceVehicle::find($id);

            $this->car_name = $vehicle->vehicle_make;
            $this->car_model = $vehicle->vehicle_model;
        }
        $this->add_car = true;
    }
    public function cancel()
    {
        $this->reset(['add_car', 'car_name', 'car_id', 'car_model', 'title']);
    }
    public function add_vehicle()
    {
        $this->validate([
            'car_name' => 'required',
            'car_model' => 'required'
        ]);
        if ($this->car_id == null) {
            $car = DeviceVehicle::create([
                'user_id' => Auth::user()->id,
                'vehicle_make' => $this->car_name,
                'vehicle_model' => $this->car_model,
                'organisation_id' => $this->org_id,
            ]);
            $this->cancel();
            $this->alert('success', 'Vehicle added successfully');
        } else {
            $vehicle = DeviceVehicle::find($this->car_id);
            $vehicle->vehicle_make = $this->car_name;
            $vehicle->vehicle_model = $this->car_model;
            $vehicle->save();
            $this->cancel();
            $this->alert('success', 'Changes made');
        }
    }
    public function render()
    {

        $cars = DeviceVehicle::where('organisation_id', $this->org_id)
            ->orWhere('user_id', $this->org_id)->get();
        return view('livewire.pages.vehicles.vehicles-livewire')->with('cars', $cars);
    }
}
