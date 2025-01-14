<?php

namespace App\Http\Livewire\Pages\Organisations;

use App\Models\DeviceVehicle;
use App\Models\Organisation;
use App\Models\User;
use App\Models\UserInvites;
use App\Models\UserOrganisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class OrganisationLivewire extends Component
{
    use LivewireAlert;
    public  $add_u = false;
    public $org_id;
    public $org;
    public $users;
    public $user_id;
    public $add_mess;

    // for user
    public $user_name;
    public $user_role = 'normal';
    public $user_email;
    public $user_password;
    // end

    public function mount($id)
    {
        $this->org_id = $id;
    }
    public function open_modal()
    {
        $this->add_u = true;
    }
    public function cancel()
    {
        $this->reset(['add_u']);
    }
    public function add_user()
    {
        $this->validate([
            'user_name' => 'required|string',
            'user_email' => 'required|email',
            'user_password' => 'required|min:8'
        ]);
        User::create([
            'name' => $this->user_name,
            'email' => $this->user_email,
            'password' => Hash::make($this->user_password)
        ]);

        $this->user_id = User::where('name', $this->user_name)->get()->value('id');
        UserOrganisation::create([
            'user_id' => $this->user_id,
            'organisation_id' => $this->org_id,
            'role' => $this->user_role
        ]);
        $this->cancel();
        $this->alert('success', 'Member added successfuly');
    }
    public function render()
    {
        $vehicles = DeviceVehicle::where('organisation_id', $this->org_id)->get();
        $this->users = UserOrganisation::where('organisation_id', $this->org_id)->get();
        $this->org = Organisation::find($this->org_id);
        $users =  UserOrganisation::where('organisation_id', $this->org_id)->get();

        return view('livewire.pages.organisations.organisation-livewire')
            ->with('users', $users)
            ->with('vehicles', $vehicles);
    }
}
