<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageUsers extends Component
{

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $user->delete();
            $this->users = User::all();
            $this->dispatch('info-updated', name: $user->name);
        }
    }

    #[On('info-updated')]
    public function onUpdate()
    {
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.admin.manage-users');
    }
}
