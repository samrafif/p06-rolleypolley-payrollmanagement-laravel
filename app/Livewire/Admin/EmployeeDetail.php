<?php

namespace App\Livewire\Admin;

use App\Models\Employee;
use Livewire\Component;

class EmployeeDetail extends Component
{

    public $employee;

    public function mount(string $id)
    {
        $this->employee = Employee::find($id);
    }

    public function render()
    {
        return view('livewire.admin.employee-detail', [
            "employee" => $this->employee
        ]);
    }
}
