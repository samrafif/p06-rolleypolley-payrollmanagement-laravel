<?php

namespace App\Livewire\Admin\TaxSettings;

use Flux\Flux;
use Livewire\Component;

class EditTaxComponent extends Component
{
    public $tax;

    public $name;
    public $description;
    public $rate;
    public $threshold;

    public function mount()
    {
        $this->name = $this->tax->name;
        $this->description = $this->tax->description;
        $this->rate = $this->tax->rate;
        $this->threshold = $this->tax->threshold_range;
    }

    public function updateTax()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
            'threshold' => 'nullable|numeric|min:0',
        ]);

        $this->tax->name = $this->name;
        $this->tax->description = $this->description;
        $this->tax->rate = $this->rate;
        $this->tax->threshold_range = $this->threshold;

        $this->tax->save();

        $this->dispatch('info-updated', name: $this->name);
        Flux::modals()->close();
    }


    public function render()
    {
        return view('livewire.admin.tax-settings.edit-tax-component');
    }
}
