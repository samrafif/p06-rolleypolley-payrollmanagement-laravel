<?php

namespace App\Livewire\Admin\ManageUsers;

use App\Models\Employee;
use App\Models\User;
use Flux\Flux;
use Livewire\Component;

class AddUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $is_admin = false;
    public $employee_id;

    public $employees;

    public function mount()
    {
        $this->employees = Employee::all();
    }

    public function newUser()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'is_admin' => 'boolean',
            'employee_id' => 'nullable|exists:employees,id'
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'is_admin' => $this->is_admin,
            'employee_id' => $this->employee_id
        ]);

        Flux::modals()->close();
        $this->dispatch('info-updated', name: $this->name);

        $this->resetExcept('employees');
    }

    public function render()
    {
        return view('livewire.admin.manage-users.add-user');
    }
}
