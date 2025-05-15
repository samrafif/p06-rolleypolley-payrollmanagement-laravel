<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use Livewire\Component;

class Employees extends Component
{

    public $employees;

    public function mount()
    {
        $this->employees = Employee::all();
    }

    public function render()
    {
        return view('livewire.admin.employees');
    }
}
