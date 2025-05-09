<div>
    {{-- Do your work, then step back. --}}
    <x-page-heading pageHeading="Company Settings" pageDesc="Edit your company's settings here"></x-page-heading>

    <div class="w-1/3">
        <form wire:submit="updateCompanyInformation" class="my-6 w-full space-y-6">
            <flux:input wire:model="name" :label="__('Name')" type="text" required autofocus autocomplete="name" />
    
            <flux:textarea wire:model="description" :label="__('Description')" type="text" required />

            <flux:input wire:model="address" :label="__('Address')" type="address" required autofocus autocomplete="address" />
            <flux:input wire:model="phone" :label="__('Phone Number')" type="phone" required autofocus autocomplete="phone" />
            <flux:input wire:model="currency_prefix" :label="__('Currency Prefix')" required autofocus />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('Save') }}</flux:button>
                </div>
    
                <x-action-message class="me-3" on="info-updated">
                    {{ __('Saved.') }}
                </x-action-message>
            </div>
        </form>
    </div>
</div>
