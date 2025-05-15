<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <flux:modal.trigger name="new-employee">
        <flux:button class="w-1/4">Add Employee</flux:button>
    </flux:modal.trigger>

    <flux:modal name="new-employee" class="md:w-256">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Add Employee</flux:heading>
                <flux:text class="mt-2">Make changes to your personal details.</flux:text>
            </div>

            <form wire:submit="newEmployee" class="space-y-4">

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

                <div class="flex">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary">
                        Add Employee
                    </flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</div>
