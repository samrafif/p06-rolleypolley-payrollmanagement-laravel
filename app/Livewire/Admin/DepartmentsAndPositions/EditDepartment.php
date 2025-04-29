<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use Flux\Flux;
use Livewire\Component;

class EditDepartment extends Component
{

    public $department;

    public $name;
    public $description;

    public function mount()
    {
        $this->name = $this->department->name;
        $this->description = $this->department->description;
    }

    public function updateDepartment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $this->department->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('info-updated', name: $this->department->name);
        Flux::modals()->close('edit-department');
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.edit-department', [
            'department' => $this->department,
        ]);
    }
}
