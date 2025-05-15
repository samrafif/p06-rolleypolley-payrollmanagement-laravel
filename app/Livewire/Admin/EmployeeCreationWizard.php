<?php

namespace App\Livewire\Admin;

use Flux\Flux;
use Livewire\Component;

class EmployeeCreationWizard extends Component
{

    // dropdowns
    public $payrolls;
    public $positions;
    public $departments;

    // fields
    public $name;
    public $email;
    public $password;

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
    public $department_id;

    // salary fields
    public $salary_amount;
    public $pay_frequency;
    public $effective_date;

    public function mount()
    {
        // Get all dropdowns
        $this->payrolls = \App\Models\Payroll::all();
        $this->positions = \App\Models\Position::all();
        $this->departments = \App\Models\Department::all();
    }

    public function createEmployee()
    {
        $this->validate([
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_number' => 'required|string|max:255',
            'tax_no' => 'required|string|max:255',
            'card_id' => 'required|string|max:255',
            'payroll_id' => 'required|exists:payrolls,id',
            'hire_date' => 'required|date',
            'position_id' => 'required|exists:positions,id',
            'department_id' => 'required|exists:departments,id',
            'salary_amount' => 'required|numeric',
            'pay_frequency' => 'required|string|max:255',
            // 'effective_date' => 'required|date',
        ]);

        $employee = \App\Models\Employee::create([
            'fullname'   => $this->fullname,
            'phone_number' => $this->phone_number,
            'address'      => $this->address,
            'bank_name'    => $this->bank_name,
            'bank_number'  => $this->bank_number,
            'npwp'       => $this->tax_no,
            'payroll_id'   => $this->payroll_id,
            'position_id'  => $this->position_id,
            'hire_date' => $this->hire_date,
            'card_id' => $this->card_id,
        ]);

        // Create the user
        \App\Models\User::create([
            // User data
            'name' => $this->fullname,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'employee_id' => $employee->id,
            'is_admin' => false,
        ]);

        // Create the salary component
        \App\Models\Salary::create([
            'employee_id' => $employee->id,
            'amount' => $this->salary_amount,
            'pay_frequency' => $this->pay_frequency,
            'effective_date' => now(),
        ]);

        $this->dispatch('info-new', name: $this->fullname);
        // redirect to the employee list page

        return redirect()->route('dashboard.manage-employees');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'fullname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'bank_name' => 'required|string|max:255',
            'bank_number' => 'required|string|max:255',
            'tax_no' => 'required|string|max:255',
            'card_id' => 'required|string|max:255',
            'payroll_id' => 'required|exists:payrolls,id',
            'hire_date' => 'required|date',
            'position_id' => 'required|exists:positions,id',
            'department_id' => 'required|exists:departments,id',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.employee-creation-wizard');
    }
}
