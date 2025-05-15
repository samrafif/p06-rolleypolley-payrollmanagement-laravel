<?php

namespace App\Livewire\Admin;

use App\Models\Payroll;
use App\Models\RanPayrolls;
use Livewire\Component;
use NumberFormatter;

class Payrolls extends Component
{

    public $payrolls;
    public $ran_payrolls;

    public function mount()
    {
        $this->payrolls = Payroll::all();
        $this->ran_payrolls = RanPayrolls::all();
    }

    public function ordinal($number)
    {
        $ends = array('th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th');
        if ((($number % 100) >= 11) && (($number % 100) <= 13))
            return $number . 'th';
        else
            return $number . $ends[$number % 10];
    }

    public function render()
    {
        return view('livewire.admin.payrolls');
    }
}
