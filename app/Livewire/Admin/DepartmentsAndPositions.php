<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DepartmentsAndPositions extends Component
{
    public $departments = [];

    public function mount()
    {
        // get all depts 
        $this->departments = Department::all();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.admin.departments-and-positions', [
            'departments' => $this->departments,
        ]);
    }
}
