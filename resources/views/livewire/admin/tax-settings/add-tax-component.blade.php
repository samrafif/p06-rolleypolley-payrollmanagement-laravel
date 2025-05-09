<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-tax">
        <flux:button class="w-1/4">Add Tax Component</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-tax" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Tax Component</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newTaxComponent" class="space-y-4">
                <flux:input wire:model="name" label="Component Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Component Description" placeholder="Description" />
                <flux:input wire:model="rate" type="number" min="1" max="100" label="Component Rate" />
                <flux:input wire:model="threshold" type="number" label="Component Salary Threshold" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Add new Tax Component</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
