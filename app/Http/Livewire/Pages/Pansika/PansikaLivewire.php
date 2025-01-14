<?php

namespace App\Http\Livewire\Pages\Pansika;

use Livewire\Component;

class PansikaLivewire extends Component
{
public $car_modal = false;
public $title;
public function buy_car(){
$this->title = "Buy Car";
$this->car_modal = true;
}
    public function render()
    {
        return view('livewire.pages.pansika.pansika-livewire')->layout('layouts.pansika');
    }
}
