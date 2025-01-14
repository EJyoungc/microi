<?php

namespace App\Http\Livewire\Pages\Devices;

use App\Models\Device;
use App\Models\LocationHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DeviceLivewire extends Component
{
    use LivewireAlert;

    public $api_key;
    public $api_modal, $qr_modal = false;
    public $device_id;
    public $user;
    public $lat, $long;
    public $lastLocation;
    public $device_name;
    public $location;

    public function find()
    {
        $lat = -15.812474;
        $long = 35.070662;

        $this->location = [
            'lat' => $lat,
            'long' => $long,
        ];
    }


    public function cancel()
    {
        $this->reset(['api_modal', 'qr_modal']);
    }

    public function mount($id)
    {
        $this->device_id = $id;
        // $this->device_name = Device::find($this->device_id)->name;
    }
    public function render()
    {
        $this->lastLocation = LocationHistory::where('device_id', $this->device_id)->get()->last();
        // $this->device_name = Device::where('id', $this->device_id)->get();

        $user = User::find(Auth::user()->id);
        return view('livewire.pages.devices.device-livewire');
    }
}
