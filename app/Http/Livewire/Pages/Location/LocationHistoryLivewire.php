<?php

namespace App\Http\Livewire\Pages\Location;

use App\Models\LocationHistory;
use Livewire\Component;

class LocationHistoryLivewire extends Component
{
    public $location = [];
    public $device_id;
    

    public function mount($id)
    {
        $this->device_id = $id;
    }

    public function render()
    {
        $this->location = LocationHistory::where('device_id', $this->device_id)->get();
        return view('livewire.pages.location.location-history-livewire');
    }
}
