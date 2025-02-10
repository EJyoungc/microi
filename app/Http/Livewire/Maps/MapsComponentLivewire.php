<?php

namespace App\Http\Livewire\Maps;

use Livewire\Component;

class MapsComponentLivewire extends Component
{
    public $latitude;
    public $longitude;

    public function mount()
    {
        $this->latitude = 0;
        $this->longitude = 0;
    }

    protected $listeners = ['updateLocation'];

    public function updateLocation($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    public function render()
    {
        return view('livewire.maps.maps-component-livewire');
    }
}
