<div>
    <flux:modal.trigger name="edit-position-{{ $position->id }}">
        <flux:button
            icon:leading="pencil"
            variant="{{ $variant }}"
            >
        </flux:button>
    </flux:modal.trigger>
    

    <flux:modal name="edit-position-{{ $position->id }}" class="md:w-96">
        <div class="space-y-6">
            <div class="text-left">
                <flux:heading size="lg">Update Position</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="updatePosition" class="space-y-4">
                <flux:input wire:model="name" label="Position Name" placeholder="Your name" />
                <flux:textarea wire:model="description" label="Position Description" placeholder="Your name" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
