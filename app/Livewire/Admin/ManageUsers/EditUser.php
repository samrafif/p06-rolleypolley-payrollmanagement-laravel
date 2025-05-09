<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Employee;
use Flux\Flux;
use Livewire\Component;

class EditUser extends Component
{
    public $user;

    public $name;
    public $email;
    public $password;
    public $is_admin = false;
    public $employee_id;

    public $employees;

    public function mount()
    {
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->is_admin = (bool)$this->user->is_admin;
        $this->employee_id = $this->user->employee_id;

        $this->employees = Employee::all();
    }

    public function updateUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'is_admin' => 'boolean',
            'employee_id' => 'nullable|exists:employees,id',
        ]);

        $this->user->name = $this->name;
        $this->user->email = $this->email;
        if ($this->password) {
            $this->user->password = bcrypt($this->password);
        }
        $this->user->is_admin = $this->is_admin;
        $this->user->employee_id = $this->employee_id;

        $this->user->save();

        $this->dispatch('info-updated', name: $this->user->name);
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.manage-users.edit-user');
    }
}
