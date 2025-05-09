<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;

class LeaveRequestForm extends Component
{
    public $employee_id;
    public $leave_type;
    public $start_date;
    public $end_date;
    public $reason;


    protected function rules()
    {
        return [
            'employee_id'  => ['required', 'exists:employees,id'],
            'leave_type'   => ['required', Rule::in(['sakit', 'cuti', 'izin', 'dinas'])],
            'start_date'   => ['required', 'date', 'before_or_equal:end_date'],
            'end_date'     => ['required', 'date', 'after_or_equal:start_date'],
            'reason'       => ['nullable', 'string'],
            // 'status'       => ['required', Rule::in(['pending', 'approved', 'declined'])],
            // 'approval_date' => ['nullable', 'date', 'after_or_equal:start_date'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate($this->rules());

        Leave::create([
            'employee_id'   => $this->employee_id,
            'leave_type'    => $this->leave_type,
            'start_date'    => $this->start_date,
            'end_date'      => $this->end_date,
            'reason'        => $this->reason,
            'status'        => 'pending',
        ]);

        //$this->dispatch('info-updated', name: $this->name);
        $this->reset(['employee_id', 'leave_type', 'start_date', 'end_date', 'reason']);
    }

    #[Layout('components.layouts.app.header')]
    public function render()
    {
        return view('livewire.leave-request-form', [
            'employees' => Employee::all(),
            'leave_types' => ['sakit', 'cuti', 'izin', 'dinas'],
        ]);
    }
}
