<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-department">
        <flux:button class="w-1/4">Add Department</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-department" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Department</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="newDepartment" class="space-y-4">
                <flux:input wire:model="name" label="Department Name" placeholder="Your name" />
                <flux:textarea wire:model="description" label="Department Description" placeholder="Your name" />
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Add new department</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
