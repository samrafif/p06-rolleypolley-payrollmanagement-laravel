<?php

namespace App\Livewire\Admin\DepartmentsAndPositions;

use App\Models\Employee;
use App\Models\Payroll;
use App\Models\User;
use Flux\Flux;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddEmployee extends Component
{

    public $department;
    public $position;

    // dropdowns
    public $payrolls;
    public $users;

    // fields
    public $user_id;
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
        $this->user_id = Auth::id(); // Assuming the user is logged in

        $this->users = User::all(); // perhaps? still figuring out the shit here man. 
        $this->payrolls = Payroll::all();
    }

    // TODO: Make it automatically make a new user too <==
    public function newEmployee()
    {
        $this->validate([
            'fullname'    => 'required|string|max:100',
            'phone_number'  => 'nullable|string|max:20',
            'address'       => 'nullable|string|max:255',
            'bank_name'     => 'nullable|string|max:100',
            'bank_number'   => 'nullable|string',
            'tax_no'        => 'nullable|string',
            'payroll_id'    => 'nullable|string|max:30',
            'position_id'   => 'required|exists:positions,id',
            'hire_date'     => 'required'
        ]);

        Employee::create([
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

        $this->dispatch('info-new', name: $this->fullname);
        Flux::modals()->close('new-employee');

        $this->resetExcept([
            'department',
            'position',
            'payrolls',
            'users'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.departments-and-positions.add-employee');
    }
}
