<?php

namespace App\Livewire\Admin\SalaryComponents;

use Flux\Flux;
use Livewire\Component;

class DeleteDeduction extends Component
{

    public $allowance;

    public function deleteDeduction()
    {
        $this->allowance->delete();
        $this->dispatch(
            'info-updated',
            name: $this->allowance,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.salary-components.delete-deduction');
    }
}
