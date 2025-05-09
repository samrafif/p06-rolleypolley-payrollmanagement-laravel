<div>
    {{-- The whole world belongs to you. --}}
    {{-- TODO: rule selection is Fixed/Percentage --}}
    <flux:modal.trigger name="new-allowance">
        <flux:button class="w-1/4">Add Allowance</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-allowance" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Allowance</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newAllowance" class="space-y-4">
                <flux:input wire:model="name" label="Component Name" placeholder="Name" />
                <flux:textarea wire:model="description" label="Component Description" placeholder="Description" />
                <flux:input wire:model="amount" type="number" label="Amount" />
                <flux:select wire:model="rule" label="Rule" placeholder="Select a rule">
                    <option value="">Select a Rule</option>
                    <option value="fixed">Fixed</option>
                    <option value="percentage">Percentage</option>
                </flux:select>
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Add new Allowance</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
