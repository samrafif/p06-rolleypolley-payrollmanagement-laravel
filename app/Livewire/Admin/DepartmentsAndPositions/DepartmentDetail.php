<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Department;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class DepartmentDetail extends Component
{

    public $id = '';

    public $department;
    public $positions;

    public function mount(string $id)
    {
        // get department by id
        $this->id = $id;
        $this->department = Department::find($this->id);

        // if not found, redirect to departments and positions page
        if (!$this->department) {
            return redirect()->route('dashboard.config.departments-and-positions');
        }

        // fetch all positions on this department
        $this->positions = $this->department->positions()->get();
    }

    #[On('info-updated')]
    public function onUpdate()
    {
        $this->department = Department::find($this->id);
        $this->positions = $this->department->positions()->get();
    }

    #[On('info-new')]
    public function onNew()
    {
        $this->onUpdate();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.department-detail', [
            'department' => $this->department,
            'positions' => $this->positions,
        ]);
    }
}
