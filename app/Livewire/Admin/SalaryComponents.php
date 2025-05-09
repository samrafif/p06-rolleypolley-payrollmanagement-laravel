<?php

namespace App\Livewire\Admin;

use App\Models\Allowance;
use App\Models\CompanySetting;
use App\Models\Deduction;
use Livewire\Component;

class SalaryComponents extends Component
{
    public $allowances;
    public $deductions;
    public $company_settings;

    public function mount()
    {
        $this->allowances = Allowance::all();
        $this->deductions = Deduction::all();
        $this->company_settings = CompanySetting::first();
    }

    public function render()
    {
        return view('livewire.admin.salary-components');
    }
}
