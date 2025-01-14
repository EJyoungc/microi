<?php

namespace App\Http\Livewire\Pages\Invites;

use App\Models\Organisation;
use App\Models\User;
use App\Models\UserInvites;
use App\Models\UserOrganisation;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class InvitesLivewire extends Component
{
    use LivewireAlert;

    public $org_name;
    public $user_id;
    public $org_id;
    public $invite_u= false;
    public $title = 'Invite';
    public $mail_to;
    public $invite_from = [];

    public function open_modal()
    {
        $this->invite_u = true;
    }
    public function cancel()
    {
        $this->reset(['invite_u']);
    }

    public function send_invite()
    {
        $this->org_id = Organisation::where('name', $this->org_name)->get()->value('id');
        $this->validate(['mail_to' => 'required|email']);
        UserInvites::create([
            'user_id' => $this->user_id,
            'org_id' => $this->org_id,
            'mail_to' => $this->mail_to
        ]);
        $this->cancel();
        $this->alert('success', 'Invite sent');
    }
    public function render()
    {
        $this->user_id = Auth::user()->id;
        if (Auth::user()->role == 'admin') {
            $invites = UserInvites::all();
        } else {
            # code...
            $invites = UserInvites::where('user_id', $this->user_id)->get();
        }

        $org = UserOrganisation::where('user_id', $this->user_id)->get();
        return view('livewire.pages.invites.invites-livewire')
            ->with('org', $org)
            ->with('invites', $invites);
    }
}
