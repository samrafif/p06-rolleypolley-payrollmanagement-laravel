<?php

namespace App\Livewire\Admin\SalaryComponents;

use Flux\Flux;
use Livewire\Component;

class EditAllowance extends Component
{
    public $allowance;

    public $name;
    public $description;
    public $amount;
    public $rule;

    public function mount()
    {
        $this->name = $this->allowance->name;
        $this->description = $this->allowance->description;
        $this->amount = $this->allowance->amount;
        $this->rule = $this->allowance->rule;
    }

    public function updateAllowance()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'rule' => 'required|string|max:255',
        ]);

        $this->allowance->name = $this->name;
        $this->allowance->description = $this->description;
        $this->allowance->amount = $this->amount;
        $this->allowance->rule = $this->rule;

        $this->allowance->save();

        $this->dispatch('info-updated', name: $this->name);
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.salary-components.edit-allowance');
    }
}
