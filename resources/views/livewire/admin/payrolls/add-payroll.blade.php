<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-payroll">
        <flux:button class="w-1/4">Add Payroll</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-payroll" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Payroll</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newPayroll" class="space-y-4">
                <flux:input wire:model="notes" label="Notes" placeholder="Notes" />

                {{-- Blame feburary --}}
                <flux:input wire:model="period_start" label="Period Start" placeholder="Period Start date" type="number" max="28" min="1" />
                <flux:input wire:model="period_end" label="Period End" placeholder="Period End date" type="number" max="28" min="1" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Add new payroll</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
