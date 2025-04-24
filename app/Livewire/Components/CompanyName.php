<?php

namespace App\Livewire\Components;

use App\Models\CompanySetting;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class CompanyName extends Component
{
    public $name = '';

    public function mount()
    {
        $companySettingData = CompanySetting::first();
        $this->name = $companySettingData->name;
    }

    #[On('info-updated')]
    public function onNameUpdated()
    {
        $companySettingData = CompanySetting::first();
        $this->name = $companySettingData->name;
    }

    #[Layout('components.layouts.app')]
    public function render()
    {
        return view('livewire.components.company-name');
    }
}
