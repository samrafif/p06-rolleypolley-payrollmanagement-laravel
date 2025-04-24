<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class AttendanceClocker extends Component
{
    public $employee;

    public function mount()
    {
        $user = Auth::user();
        // get `employee_id` from user model then get employee from employee model
        $employeeId = $user->employee_id;
        $this->employee = Employee::find($employeeId);

        if (!$this->employee) {
            $this->dispatch('not-found', name: $employeeId);
            // redirect()->route('dashboard'); // TODO: UNCOMMENT L8TR!!!
        }
    }

    #[Layout('components.layouts.app.header')]
    public function render()
    {
        return view('livewire.employee.attendance-clocker');
    }
}
