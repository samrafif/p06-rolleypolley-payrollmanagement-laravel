<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use Flux\Flux;
use Livewire\Component;

class DeleteEmployee extends Component
{

    public $employee;

    public function deleteEmployee()
    {
        $this->employee->delete();
        $this->dispatch(
            'info-updated',
            name: $this->employee->fullname,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.delete-employee');
    }
}
