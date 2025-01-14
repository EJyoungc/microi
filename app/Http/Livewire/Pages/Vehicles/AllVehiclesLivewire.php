<?php

namespace App\Http\Livewire\Pages\Vehicles;

use Illuminate\Support\Facades\Auth;
use App\Models\DeviceVehicle;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class AllVehiclesLivewire extends Component
{
    use WithPagination;
    use LivewireAlert;
    public $modal = false;
    // vehicle details
    public $vehicle_id;
    public $vehicle_make;
    public $vehicle_model;
    public $make_year;
    public $vin;
    public $mileage;
    public $fuel_type;
    // end vehicle details
    public $title = 'add';
    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';
   
    public function open_modal($id = null)
    {
        if ($id == null) {
            $this->title = 'add';
        } else {
            $this->title = 'edit';
            $this->vehicle_id = $id;
            $vehicle = DeviceVehicle::find($id);

            $this->vehicle_make = $vehicle->vehicle_make;
            $this->vehicle_model = $vehicle->vehicle_model;
            $this->make_year = $vehicle->make_year;
            $this->vin = $vehicle->vin;
            $this->mileage = $vehicle->mileage;
            $this->fuel_type = $vehicle->fuel_type;
        }
        $this->modal = true;
    }
    public function cancel()
    {
        $this->reset(['modal', 'vehicle_make', 'vehicle_model', 'make_year', 'vin', 'mileage', 'fuel_type']);
    }
    public function add_vehicle()
    {
        $this->validate([
            'vehicle_make' => 'required',
            'vehicle_model' => 'required',
            'make_year' => 'required|integer|digits:4|min:1800|max:9999',
            'vin' => 'required',
            'mileage' => 'required|integer',
            'fuel_type' => 'required'
        ]);
        if ($this->title == 'add') {
            DeviceVehicle::create([
                'user_id' => Auth::user()->id,
                'vehicle_make' => $this->vehicle_make,
                'vehicle_model' => $this->vehicle_model,
                'make_year' => $this->make_year,
                'vin' => $this->vin,
                'mileage' => $this->mileage,
                'fuel_type' => $this->fuel_type
            ]);
            $this->cancel();
            $this->alert('success', 'Added Success');
        } else {
            $vehicle = DeviceVehicle::find($this->vehicle_id);
            $vehicle->vehicle_make = $this->vehicle_make;
            $vehicle->vehicle_model = $this->vehicle_model;
            $vehicle->save();
            $this->cancel();
            $this->alert('success', 'Updated Successfully');
        }
    }

    public function render()
    {
        if (Auth::user()->role == 'systmes admin') {
            $cars = DeviceVehicle::with('user')->where('vehicle_make', 'like', '%' . $this->search . '%')
                ->orWhere('vehicle_model', 'like', '%' . $this->search . '%')
                ->paginate(3);
        } else {
            $cars = DeviceVehicle::with('user')->where('user_id', Auth::user()->id)
                ->where('vehicle_make', 'like', '%' . $this->search . '%')
                ->orWhere('vehicle_model', 'like', '%' . $this->search . '%')
                ->paginate(3);
        }

        return view('livewire.pages.vehicles.all-vehicles-livewire')->with('vehicles', $cars);
    }
}
