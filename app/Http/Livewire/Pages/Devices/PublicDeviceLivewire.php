<?php

namespace App\Http\Livewire\Pages\Devices;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class PublicDeviceLivewire extends Component
{
    use LivewireAlert;

    public $api_key;
    public $api_modal, $qr_modal = false;
    public $device_id;
    public $user;
    public function cancel()
    {
        $this->reset(['api_modal','qr_modal']);
    }

    public function updatedApiKey()
    {
        $this->validate(['api_key' => 'required|string']);
        $this->user = User::find(Auth::user()->id);
        $this->user->map_key = $this->api_key;
        $this->user->save();
        $this->alert('success', 'Api added!');
    }

    public function mount($id)
    {
        $this->device_id = $id;
    }
    public function render()
    {


        $user = User::find(Auth::user()->id);
        $this->api_key = $user->map_key;
        return view('livewire.pages.devices.public-device-livewire');
    }
}
