<?php

namespace App\Livewire\Admin\SalaryComponents;

use App\Models\Deduction;
use Flux\Flux;
use Livewire\Component;

class AddDeduction extends Component
{

    public $name;
    public $description;
    public $amount;
    public $rule;

    public function newDeduction()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:0',
            'rule' => 'required|in:fixed,percentage',
        ]);

        $deduction = Deduction::create([
            'name' => $this->name,
            'description' => $this->description,
            'amount' => $this->amount,
            'rule' => $this->rule,
        ]);

        Flux::modals()->close('new-deduction');
        $this->dispatch('info-updated', name: $this->name);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.salary-components.add-deduction');
    }
}
