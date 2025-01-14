<?php

namespace App\Http\Livewire\Pages\Organisations;

use App\Models\Organisation;
use App\Models\UserOrganisation;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class OrgUserLivewire extends Component
{
    use LivewireAlert;
    public $org_id;


    public function mount($id)
    {
        $this->org_id = $id;
    }
    public function change_role($id)
    {
        $org_id = UserOrganisation::where('user_id', $id)->get()->value('id');
        $org_role = UserOrganisation::find($org_id);
        if ($org_role->role == "admin") {
            $org_role->role = 'normal';
            $org_role->save();
            $this->alert('success', 'Updated successfully');
        } else {
            $org_role->role = 'admin';
            $org_role->save();
            $this->alert('success', 'Updated successfully');
        }
    }
    public function render()
    {
        $users = UserOrganisation::where('organisation_id', $this->org_id)->get();
        $org = Organisation::find($this->org_id);
        return view('livewire.pages.organisations.org-user-livewire')->with('users', $users)->with('org', $org);
    }
}
