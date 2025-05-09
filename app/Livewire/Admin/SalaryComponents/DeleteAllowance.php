<?php

namespace App\Livewire\Admin\SalaryComponents;

use App\Models\Allowance;
use Flux\Flux;
use Livewire\Component;

class DeleteAllowance extends Component
{
    public $allowance;

    public function deleteAllowance()
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
        return view('livewire.admin.salary-components.delete-allowance');
    }
}
