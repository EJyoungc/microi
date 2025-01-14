<?php

namespace App\Http\Livewire\Pages\Devices;

use App\Models\AssignDevice;
use App\Models\Device;
use App\Models\DeviceVehicle;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DevicesLivewire extends Component
{
    use LivewireAlert;
    public $name;
    public $details;
    public $modal = false;
    public $devices = [];
    public $button_status = 'add';
    public $device;
    public $vehicle = [];
    public $vehicle_make;
    public $vehicle_id;
    public $assign_d = false;


    public function change_status($id)
    {
        $this->device = Device::find($id);
        if ($this->device->status == 'active') {
            $this->device->status = 'inactive';
            $this->device->save();
            $this->alert('success', 'updated successfuly');
        } else {
            $this->device->status = 'active';
            $this->device->save();
            $this->alert('success', 'updated successfuly');
        }
    }
    public function add_modal($id = null)
    {
        if ($id == null) {
            $this->button_status = 'add';
        } else {
            $this->button_status = 'edit';
            $this->device = Device::find($id);

            $this->name = $this->device->name;
            $this->details = $this->device->details;
        }
        $this->modal = true;
    }
    public function cancel()
    {
        $this->reset([
            'modal',
            'name',
            'details',
            'button_status',
            'assign_d',
            'vehicle_make'
        ]);
    }
    public function add_device()
    {
        $this->validate([
            'name' => 'required|string',
            'details' => 'required|string',
        ]);

        if ($this->button_status == 'add') {
            Device::create([
                'name' => $this->name,
                'details' => $this->details
            ]);
            $this->cancel();
            $this->alert('success', 'Created successfuly');
        } else {
            $this->device->name = $this->name;
            $this->device->details = $this->details;
            $this->device->save();
            $this->cancel();
            $this->alert('success', 'Updated successfuly');
        }
    }
    public function vehicle_modal($id)
    {
        $this->vehicle_id = $id;
        $this->assign_d = true;
    }
    public function asign_vehicle()
    {
        $this->validate(['vehicle_make' => 'required']);

        AssignDevice::create([
            'user_id' => Auth::user()->id,
            'device_id' => $this->vehicle_id,
            'vehicle_id' => DeviceVehicle::where('vehicle_make', $this->vehicle_make)->get()->value('id')
        ]);
        $car_id = DeviceVehicle::where('vehicle_make', $this->vehicle_make)->get()->value('id');
        $this->vehicle = DeviceVehicle::find($car_id);
        $this->vehicle->device_id = AssignDevice::where('vehicle_id', $this->vehicle->id)->get()->value('device_id');
        $this->vehicle->save();
        $this->alert('success', 'Updated successfully');
        // adding device_id to vehicle

        //.......
        $this->cancel();
    }
    public function render()
    {
        $this->devices = Device::all();
        $vehicles = DeviceVehicle::all();
        return view('livewire.pages.devices.devices-livewire')->with('vehicles', $vehicles);
    }
}
