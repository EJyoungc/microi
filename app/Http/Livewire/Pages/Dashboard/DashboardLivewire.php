<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Events\testEvent;
use App\Models\Device;
use App\Models\DeviceVehicle;
use App\Models\Organisation;
use App\Models\User;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class DashboardLivewire extends Component
{
    use LivewireAlert;
    public $text;

    public function send(){

        event(new testEvent($this->text));
        // $this->echo($this->text);
        // dd($this->text);

    }

    #[On('echo:gps-data,testEvent')]
    public function echo($data){
        $this->alert('success', 'Data Recieved');
    }


    public function render()
    {
        $organisations = Organisation::all();
        $vehicles = DeviceVehicle::all();
        $users = User::where('role', 'normal')->get();
        $devices = Device::all();
        return view('livewire.pages.dashboard.dashboard-livewire')
            ->with('vehicles', $vehicles)
            ->with('organisations', $organisations)
            ->with('users', $users)
            ->with('devices', $devices);
    }
}
