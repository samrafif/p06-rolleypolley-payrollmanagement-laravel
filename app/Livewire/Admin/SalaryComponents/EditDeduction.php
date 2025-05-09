<?php

namespace App\Livewire\Admin\SalaryComponents;

use Flux\Flux;
use Livewire\Component;

class EditDeduction extends Component
{
    public $deduction;

    public $name;
    public $description;
    public $amount;
    public $rule;

    public function mount()
    {
        $this->name = $this->deduction->name;
        $this->description = $this->deduction->description;
        $this->amount = $this->deduction->amount;
        $this->rule = $this->deduction->rule;
    }

    public function updateDeduction()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'rule' => 'required|string|max:255',
        ]);

        $this->deduction->name = $this->name;
        $this->deduction->description = $this->description;
        $this->deduction->amount = $this->amount;
        $this->deduction->rule = $this->rule;

        $this->deduction->save();

        $this->dispatch('info-updated', name: $this->name);
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.salary-components.edit-deduction');
    }
}
