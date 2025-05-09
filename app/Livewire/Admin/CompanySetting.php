<?php

namespace App\Livewire\Admin;

use App\Models\CompanySetting as ModelsCompanySetting;
use Livewire\Attributes\Layout;
use Livewire\Component;

class CompanySetting extends Component
{
    public $id = '';
    public $name = '';
    public $description = '';
    public $address = '';
    public $phone = '';
    public $currency_prefix = '';

    public function mount()
    {
        $companySettingData = ModelsCompanySetting::first();
        $this->id = $companySettingData->id;
        $this->name = $companySettingData->name;
        $this->description = $companySettingData->description;
        $this->address = $companySettingData->address;
        $this->phone = $companySettingData->phone;
        $this->currency_prefix = $companySettingData->currency_prefix;
    }

    public function updateCompanyInformation()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'currency_prefix' => 'nullable|string|max:255',
        ]);

        ModelsCompanySetting::where('id', $this->id)->update([
            'name' => $this->name,
            'description' => $this->description,
            'address' => $this->address,
            'phone' => $this->phone,
            'currency_prefix' => $this->currency_prefix,
        ]);

        $this->dispatch('info-updated', name: $this->id);
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.admin.company-setting');
    }
}
