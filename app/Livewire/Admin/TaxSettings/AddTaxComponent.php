<?php

namespace App\Livewire\Admin\TaxSettings;

use App\Models\Taxes;
use Flux\Flux;
use Livewire\Component;

class AddTaxComponent extends Component
{

    public $name;
    public $description;
    public $rate;
    public $threshold;

    public function newTaxComponent()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'rate' => 'required|numeric|min:0|max:100',
            'threshold' => 'nullable|numeric|min:0',
        ]);

        Taxes::create([
            'name' => $this->name,
            'description' => $this->description,
            'rate' => $this->rate,
            'threshold_range' => $this->threshold,
        ]);

        $this->dispatch('info-new', name: $this->name);
        Flux::modals()->close('new-tax');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.admin.tax-settings.add-tax-component');
    }
}
