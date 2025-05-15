<?php

namespace App\Livewire\Admin\Payrolls;

use App\Models\Payroll;
use Livewire\Component;

class AddPayroll extends Component
{

    public $notes;
    public $period_start;
    public $period_end;

    public function newPayroll()
    {
        $this->validate([
            'notes' => 'required|string|max:255',
            'period_start' => 'required',
            'period_end' => 'required',
        ]);

        Payroll::create([
            'notes' => $this->notes,
            'payroll_period_start' => $this->period_start,
            'payroll_period_end' => $this->period_end,
        ]);

        session()->flash('message', 'Payroll added successfully.');
    }

    public function render()
    {
        return view('livewire.admin.payrolls.add-payroll');
    }
}
