<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Department;
use Flux\Flux;
use Livewire\Component;

class AddDepartment extends Component
{

    public $name;
    public $description;

    public function newDepartment()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Logic to save the department
        Department::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->dispatch('info-updated', name: $this->name);
        Flux::modals()->close('new-department');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.add-department');
    }
}
