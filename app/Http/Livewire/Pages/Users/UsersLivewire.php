<?php

namespace App\Http\Livewire\Pages\Users;

use App\Models\User;
use Illuminate\Broadcasting\Broadcasters\UsePusherChannelConventions;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class UsersLivewire extends Component
{
    use WithPagination;
    use LivewireAlert;
    protected $paginationTheme = 'bootstrap';
    // public $users = [];
    public $role_modal = false;
    public $user;
    public $role;

    public $search;

    protected $queryString = ['search'];

    public function change_role($id)
    {
        $this->user = User::find($id);
        $this->role_modal = true;
    }
    public function cancel()
    {
        $this->reset(['role_modal', 'role']);
    }
    public function store_role()
    {
        $this->validate([
            'role' => 'required'
        ]);
        $this->user->role = $this->role;
        $this->user->save();
        $this->cancel();
        $this->alert('success', 'Updated');
    }
    public function change_status($id)
    {
        $this->user = User::find($id);
        if ($this->user->status == 'active') {
            $this->user->status = 'inactive';
            $this->user->save();
            $this->alert('success', 'Successfully deactivated.');
        } else {
            $this->user->status = 'active';
            $this->user->save();
            $this->alert('success', 'Successfuly activated');
        }
    }
    public function render()
    {

        $users = User::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('email', 'like', '%' . $this->search . '%')
            ->paginate(3);
        return view('livewire.pages.users.users-livewire')->with('users', $users);
    }
}
