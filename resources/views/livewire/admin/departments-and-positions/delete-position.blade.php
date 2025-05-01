<div>
    <flux:modal.trigger name="edit-profile-{{ $position->id }}">
        <flux:button variant="danger" icon:leading="trash">Delete</flux:button>
    </flux:modal.trigger>

    <flux:modal name="edit-profile-{{ $position->id }}" class="md:w-96">
        <div class="space-y-6">
            <div class="text-left">
                <flux:heading size="lg">Delete Position</flux:heading>
                <flux:text class="mt-2 font-bold text-xl">{{ $position->name }}</flux:text>
                <flux:text class="mt-2">Are you sure you want to delete this position. <br/> This action cannot be reversed.</flux:text>
            </div>
            <div class="flex gap-4">
                <flux:spacer />

                <flux:button x-on:click="$flux.modal('edit-profile-{{ $position->id }}').close()">Cancel</flux:button>
                <flux:button wire:click="deletePosition" variant="danger">Delete</flux:button>
            </div>
        </div>
    </flux:modal>
</div>
