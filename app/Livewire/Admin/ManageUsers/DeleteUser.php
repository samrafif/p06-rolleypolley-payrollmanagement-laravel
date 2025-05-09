<?php

namespace App\Livewire\Admin\ManageUsers;

use Flux\Flux;
use Livewire\Component;

class DeleteUser extends Component
{
    public $user;

    public function deleteUser()
    {
        $this->user->delete();
        $this->dispatch(
            'info-updated',
            name: $this->user,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.manage-users.delete-user');
    }
}
