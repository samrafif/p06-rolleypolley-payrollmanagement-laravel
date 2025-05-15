<div>
    <flux:modal.trigger name="edit-employee-{{ $employee->id }}">
        <flux:button
            icon:leading="pencil"
            variant="{{ $variant }}"
            >
        </flux:button>
    </flux:modal.trigger>
    

    <flux:modal name="edit-employee-{{ $employee->id }}" class="md:w-256">
        <div class="space-y-6">
            <div  class="text-left">
                <flux:heading size="lg">Update Employee</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>
            <form wire:submit="updateEmployee" class="space-y-4">
                <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
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
                {{-- <flux:input 
                    type="hidden" 
                    wire:model="user_id"  /> --}}

                <flux:input 
                    wire:model="hire_date"
                    label="Hire Date"
                    type="date" />

                </div>

                <flux:select wire:model="payroll_id" label="Payroll" placeholder="Select a payroll">
                    <option value="">Select a payroll</option>
                    @foreach ($payrolls as $payroll)
                        <option value="{{ $payroll->id }}">{{ $payroll->payroll_period_start }}-{{ $payroll->payroll_period_end }}</option>
                    @endforeach
                </flux:select>

                <flux:select wire:model="position_id" label="Position (can move between departments)" placeholder="Select a position">
                    <option value="">Select a position</option>
                    @foreach ($departments as $department)
                        <option disabled class="font-bold" value="{{ $department->id }}_d">{{ strtoupper($department->name) }}</option>
                        @foreach ($department->positions as $position)
                            <option value="{{ $position->id }}">- {{ $position->name }}</option>
                        @endforeach
                    @endforeach
                </flux:select>

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">Save changes</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
