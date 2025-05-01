<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-department">
        <flux:button class="w-1/4">Add Position</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-department" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Position</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newPosition" class="space-y-4">
                <flux:input wire:model="name" label="Position Name" placeholder="Your name" />
                <flux:textarea wire:model="description" label="Position Description" placeholder="Your name" />
                <flux:input wire:model="clockInTime" label="Clock In Time" type="time" />
                <flux:input wire:model="shiftDuration" label="Shift Duration" type="number" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Add new position</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
