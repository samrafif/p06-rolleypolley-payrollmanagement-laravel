<?php

namespace App\Livewire\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

class DepartmentsAndPositions extends Component
{
    public $departments = [];

    public function mount() {}

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.admin.departments-and-positions');
    }
}
