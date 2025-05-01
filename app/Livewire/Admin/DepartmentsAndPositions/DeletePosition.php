<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use Flux\Flux;
use Livewire\Component;

class DeletePosition extends Component
{
    public $position;
    public $department;

    public function deletePosition()
    {
        $this->position->delete();
        $this->dispatch(
            'info-updated',
            name: $this->position->name,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.delete-position', [
            'position' => $this->position,
        ]);
    }
}
