<?php

namespace App\Livewire\Admin;

use App\Models\CompanySetting;
use App\Models\Taxes;
use Livewire\Component;

class TaxSettings extends Component
{

    public $taxes;
    public $company_settings;

    public function mount()
    {
        // Fetch the company settings from the database
        $this->taxes = Taxes::all();
        $this->company_settings = CompanySetting::first();
    }

    public function render()
    {
        return view('livewire.admin.tax-settings', [
            'taxes' => $this->taxes,
        ]);
    }
}
