<?php

namespace App\Livewire\Admin;

use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class DepartmentsAndPositions extends Component
{
    public $departments = [];

    public function mount()
    {
        // get all depts 
        $this->departments = Department::all();

        foreach ($this->departments as $department) {
            $department->headcount = 0;
            foreach ($department->positions as $position) {
                $department->headcount += $position->employees()->count();
            }
        }
    }

    #[On('info-updated')]
    public function onUpdate()
    {
        // get all depts 
        $this->departments = Department::all();
    }

    #[On('info-new')]
    public function onNew()
    {
        $this->onUpdate();
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.admin.departments-and-positions', [
            'departments' => $this->departments,
        ]);
    }
}
