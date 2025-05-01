<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Component;

class PositionDetail extends Component
{

    public $id = '';
    public $id2 = '';

    public $department;
    public $position;
    public $employees;

    public function mount(string $id, string $id2)
    {
        // get department by id
        $this->id = $id;
        $this->id2 = $id2;

        $this->department = Department::find($this->id);
        // get position by id
        $this->position = $this->department->positions()->find($this->id2);
        // get employees by position id
        $this->employees = $this->position->employees()->get();

        // if not found, redirect to departments and positions page
        if (!$this->department || !$this->position) {
            return redirect()->route('dashboard.config.departments-and-positions');
        }
    }

    #[On('info-updated')]
    public function onUpdate()
    {
        $this->onNew();
    }

    #[On('info-new')]
    public function onNew()
    {
        $this->department = Department::find($this->id);
        $this->position = $this->department->positions()->find($this->id2);
        $this->employees = $this->position->employees()->get();
    }


    public function render()
    {
        return view('livewire.admin.departments-and-positions.position-detail', [
            'department' => $this->department,
            'position' => $this->position,
            'employees' => $this->employees,
        ]);
    }
}
