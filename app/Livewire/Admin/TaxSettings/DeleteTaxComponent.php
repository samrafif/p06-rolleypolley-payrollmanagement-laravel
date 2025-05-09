<?php

namespace App\Livewire\Admin\TaxSettings;

use Flux\Flux;
use Livewire\Component;

class DeleteTaxComponent extends Component
{
    public $tax;

    public function deleteTax()
    {
        $this->tax->delete();
        $this->dispatch(
            'info-updated',
            name: $this->tax,
        );
        Flux::modals()->close();
    }

    public function render()
    {
        return view('livewire.admin.tax-settings.delete-tax-component');
    }
}
