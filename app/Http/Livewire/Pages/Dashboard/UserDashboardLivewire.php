<?php

namespace App\Http\Livewire\Pages\Dashboard;

use App\Models\DeviceVehicle;
use App\Models\LocationHistory;
use App\Models\Organisation;
use App\Models\UserOrganisation;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Node\Query\OrExpr;

class UserDashboardLivewire extends Component
{

    public function render()
    {

        $vehicles = DeviceVehicle::where('user_id', Auth::user()->id)->get();
        $organisations = UserOrganisation::where('user_id', Auth::user()->id)->get();
        return view('livewire.pages.dashboard.user-dashboard-livewire')
            ->with('organisations', $organisations)
            ->with('vehicles', $vehicles);
    }
}
