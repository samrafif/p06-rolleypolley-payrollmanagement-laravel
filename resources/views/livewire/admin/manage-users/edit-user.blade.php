<div>
    <flux:modal.trigger name="edit-user-{{ $user->id }}">
        <flux:button
            icon:leading="pencil"
            variant="filled"
            >
        </flux:button>
    </flux:modal.trigger>
    

    <flux:modal name="edit-user-{{ $user->id }}" class="md:w-96">
        <div class="space-y-6">
            <div class="text-left">
                <flux:heading size="lg">Update user</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="updateUser" class="space-y-4">
                <flux:input wire:model="name" label="Username" placeholder="Your name" />
                <flux:input wire:model="email" label="Email" placeholder="Your email" />
                <flux:input wire:model="password" label="Password" placeholder="Your password" type="password" />
                <flux:select wire:model="employee_id" label="Employee" placeholder="Select an employee">
                    <option value="">Select an employee</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->fullname }} - {{ $employee->position->name }}</option>
                    @endforeach
                </flux:select>
                <flux:checkbox wire:model="is_admin" label="Is admin" />
                
                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
