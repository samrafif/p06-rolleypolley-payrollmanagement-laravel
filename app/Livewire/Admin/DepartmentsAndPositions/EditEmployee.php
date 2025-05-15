<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Department;
use App\Models\Employee;
use App\Models\Payroll;
use App\Models\Position;
use DateTime;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditEmployee extends Component
{

    public $department;
    public $position;
    public $departments;
    public $employee;
    public $variant;
    public $payrolls;

    public $fullname;
    public $phone_number;
    public $address;
    public $bank_name;
    public $bank_number;
    public $tax_no;
    public $card_id;
    public $payroll_id;
    public $hire_date;
    public $position_id;
    public $department_id; // if needed, prolly not

    public function mount()
    {
        // get department by id
        $this->department_id = $this->department->id;
        $this->position_id = $this->position->id;

        $this->payrolls = Payroll::all();
        $this->departments = Department::all();

        if ($this->employee) {
            $this->fullname = $this->employee->fullname;
            $this->phone_number = $this->employee->phone_number;
            $this->address = $this->employee->address;
            $this->bank_name = $this->employee->bank_name;
            $this->bank_number = $this->employee->bank_number;
            $this->tax_no = $this->employee->npwp;
            $this->payroll_id = $this->employee->payroll_id;
            $this->hire_date = (new DateTime($this->employee->hire_date))->format("Y-m-d"); // https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input/date#:~:text=to%20the%20format-,yyyy%2Dmm%2Ddd,-.
            $this->card_id = $this->employee->card_id;
        }
    }

    public function updateEmployee()
    {
        //  NOTE: Validation no work for now, fix later
        // $this->validate([
        //     'fullname' => 'required|string|max:255',
        //     'phone_number' => 'required|string|max:255',
        //     'address' => 'required|string|max:255',
        //     'bank_name' => 'required|string|max:255',
        //     'bank_number' => 'required|string|max:255',
        //     'tax_no' => 'required|string|max:255',
        //     'payroll_id' => 'required|string|max:255',
        //     'card_id' => 'required|string|max:255',
        // ]);

        $this->employee->update([
            'fullname' => $this->fullname,
            'phone_number' => $this->phone_number,
            'address' => $this->address,
            'bank_name' => $this->bank_name,
            'bank_number' => $this->bank_number,
            'npwp' => $this->tax_no,
            'payroll_id' => $this->payroll_id,
            'card_id' => $this->card_id,
            'hire_date' => $this->hire_date,
            'position_id' => $this->position_id,
        ]);

        $this->dispatch('info-updated', name: $this->fullname);
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.edit-employee', [
            'department' => $this->department,
            'position' => $this->position,
            'employee' => $this->employee,
            'variant' => $this->variant,
        ]);
    }
}
