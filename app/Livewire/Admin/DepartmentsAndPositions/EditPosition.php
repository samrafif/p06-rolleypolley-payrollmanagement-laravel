<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use Flux\Flux;
use Livewire\Component;

class EditPosition extends Component
{

    public $name;
    public $description;
    public $clockInTime;
    public $shiftDuration;

    public $department;
    public $departmentId;
    public $position;
    public $variant;


    public function mount()
    {
        // get department by id
        $this->departmentId = $this->department->id;

        // fill fields
        $this->name = $this->position->name;
        $this->description = $this->position->description;
        $this->clockInTime = $this->position->shift_clock_in_time;
        $this->shiftDuration = $this->position->shift_duration;
    }

    public function updatePosition()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'clockInTime' => 'required|string|max:255',
            'shiftDuration' => 'required|integer|min:1',
        ]);

        // Logic to update the position
        $this->position->update([
            'name' => $this->name,
            'description' => $this->description,
            'shift_clock_in_time' => $this->clockInTime,
            'shift_duration' => $this->shiftDuration,
        ]);

        $this->dispatch('info-updated', name: $this->name);
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.edit-position', [
            'department' => $this->department,
            'position' => $this->position,
            'variant' => $this->variant,
        ]);
    }
}
