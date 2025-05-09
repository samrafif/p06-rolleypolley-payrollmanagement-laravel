<div>
    {{-- The whole world belongs to you. --}}
    {{-- TODO: rule selection is Fixed/Percentage --}}
    <flux:modal.trigger name="edit-tax-{{ $tax->id }}">
        <flux:button
            icon:leading="pencil"
            variant="filled"
            >
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-tax-{{ $tax->id }}" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Edit tax component</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="updateTax" class="space-y-4">
                <flux:input wire:model="name" label="Component Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Component Description" placeholder="Description" />
                <flux:input wire:model="rate" type="number" min="1" max="100" label="Component Rate" />
                <flux:input wire:model="threshold" type="number" label="Component Salary Threshold" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
