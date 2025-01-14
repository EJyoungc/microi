<?php

namespace App\Http\Livewire\Pages\Organisations;

use App\Models\Organisation;
use App\Models\UserOrganisation;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class OrganisationsLivewire extends Component
{
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    // public $organisations = [];
    public $add_org = false;
    public $name;
    public $org_id;
    public $description;
    public $title = 'add';
    public $org;
    public $search;
    protected $queryString = ['search'];




    public function open_modal($id = null)
    {
        if ($id == null) {
            $this->title = "add";
        } else {
            $this->title = "Edit";
            $this->org_id = $id;
            $org = Organisation::find($id);

            $this->name = $org->name;
            $this->description = $org->description;
        }
        $this->add_org = true;
    }

    public function cancel()
    {
        $this->reset(['add_org', 'name', 'description']);
    }
    public function add_organisation()
    {
        $this->validate([
            'name' => 'required|string',
            'description' => 'required'
        ]);
        if ($this->title == 'add') {
            $org = Organisation::create([
                'name' => $this->name,
                'description' => $this->description
            ]);
            UserOrganisation::create([
                'user_id' => Auth::user()->id,
                'organisation_id' => $org->id,
                'role' => 'admin'
            ]);
            $this->cancel();
            $this->alert('success', 'Organisation created successfully');
        } else {
            $org = Organisation::find($this->org_id);
            $org->name = $this->name;
            $org->description = $this->description;
            $org->save();
            $this->cancel();
            $this->alert('success', 'Updated successfully');
        }
    }
    public function org_delete($id)
    {
        $this->org = Organisation::find($id)->delete();
        $this->alert('success', 'Removed Successfuly');
    }

    public function change_status($id)
    {
        $this->org = Organisation::find($id);
        if ($this->org->status == 'inactive') {
            $this->org->status = 'active';
            $this->org->save();
            $this->alert('success', 'Activated successfully');
        } else {
            $this->org->status = 'inactive';
            $this->org->save();
            $this->alert('success', 'Deactivated successfully');
        }
    }
    public function render()
    {
        // $this->organisations = Organisation::all();
        if (Auth::user()->role == 'systems admin') {
            $orgs =  Organisation::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('status', 'like', '%' . $this->search . '%')
                ->paginate(3);
        } else {
            $orgs =  Organisation::join('user_organisations', 'user_organisations.organisation_id', '=', 'organisations.id')
                // ->where('user_organisations.organisation_id', '=', 'organisations.id')
                ->where('user_organisations.user_id', Auth::user()->id)
                ->where('name', 'like', '%' . $this->search . '%')
                ->Where('status', 'like', '%' . $this->search . '%')
                ->paginate(3);
        }

        return view('livewire.pages.organisations.organisations-livewire')->with('organisations', $orgs);
    }
}
