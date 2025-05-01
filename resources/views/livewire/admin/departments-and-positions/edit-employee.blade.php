<div>
    <flux:modal.trigger name="edit-employee-{{ $employee->id }}">
        <flux:button
            icon:leading="pencil"
            variant="{{ $variant }}"
            >
        </flux:button>
    </flux:modal.trigger>
    

    <flux:modal name="edit-employee-{{ $employee->id }}" class="md:w-96">
        <div class="space-y-6">
            <div  class="text-left">
                <flux:heading size="lg">Update Employee</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="updateEmployee" class="space-y-4">
                <flux:input 
                    wire:model="fullname" 
                    label="Full Name" 
                    placeholder="Full name" />

                <flux:input 
                    wire:model="phone_number" 
                    label="Phone Number" 
                    placeholder="+1 (555) 123-4567" />

                <flux:input 
                    wire:model="address" 
                    label="Address" 
                    placeholder="123 Main St, City, Country" />

                <flux:input 
                    wire:model="bank_name" 
                    label="Bank Name" 
                    placeholder="e.g. Bank of World" />

                <flux:input 
                    wire:model="bank_number" 
                    label="Bank Account Number" 
                    placeholder="0123456789" />

                <flux:input 
                    wire:model="tax_no" 
                    label="Tax Number" 
                    placeholder="e.g. 12-3456789" />
                
                <flux:input 
                    wire:model="card_id" 
                    label="ID Card number" 
                    placeholder="e.g. 1234567890" />

                {{-- Hidden fields --}}
                {{-- TODO: Make to be dropdown pick from existing users --}}
                <flux:input 
                    type="hidden" 
                    wire:model="user_id"  />

                {{-- TODO: Make to be dropdown pick from existing payrolls --}}
                <flux:input 
                    type="hidden" 
                    wire:model="payroll_id" 
                    placeholder="e.g. PR12345" />

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
