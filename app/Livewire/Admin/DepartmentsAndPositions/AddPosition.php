<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Position;
use Flux\Flux;
use Livewire\Component;

class AddPosition extends Component
{
    public $name;
    public $description;
    public $clockInTime;
    public $shiftDuration;

    public $department;
    public $departmentId;

    public function mount()
    {
        // get department by id
        $this->departmentId = $this->department->id;
    }

    public function newPosition()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'clockInTime' => 'required|string|max:255',
            'shiftDuration' => 'required|integer|min:1',
        ]);

        // Logic to save the position
        Position::create([
            'name' => $this->name,
            'description' => $this->description,
            'shift_clock_in_time' => $this->clockInTime,
            'shift_duration' => $this->shiftDuration,
            'department_id' => $this->departmentId,
        ]);

        $this->dispatch('info-new', name: $this->name);
        Flux::modals()->close('new-position');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.add-position');
    }
}
