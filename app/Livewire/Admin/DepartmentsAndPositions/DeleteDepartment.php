<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use Flux\Flux;
use Livewire\Component;

class DeleteDepartment extends Component
{
    public $department;

    public function deleteDepartment()
    {
        $this->department->delete();
        $this->dispatch(
            'info-updated',
            name: $this->department,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.delete-department', [
            'department' => $this->department,
        ]);
    }
}
