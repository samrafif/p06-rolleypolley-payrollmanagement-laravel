<div class="flex flex-col items-center">
    {{-- Be like water. --}}

    <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100 transition-colors duration-300">
        Employee Creation Wizard
    </h1>
    <p class="mt-2 text-slate-500 dark:text-slate-400 transition-colors duration-300">
        Create an Employee along with their Account and Salary settings
    </p>

    <form wire:submit="createEmployee" class="space-y-4 w-1/2">
        
        <h1 class="text-xl">User Details</h1>
        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
        <flux:input wire:model="email" label="Email" placeholder="Your email" />
        <flux:input wire:model="password" label="Password" placeholder="Your password" type="password" />
        </div>

        <h1 class="text-xl mt-8">Employee Details</h1>
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
        
        

        <flux:select wire:model="position_id" label="Position (can move between departments)" placeholder="Select a position">
            <option value="">Select a position</option>
            @foreach ($departments as $department)
                <option disabled class="font-bold" value="{{ $department->id }}">{{ strtoupper($department->name) }}</option>
                @foreach ($department->positions as $position)
                    <option value="{{ $position->id }}">- {{ $position->name }}</option>
                @endforeach
            @endforeach
        </flux:select>

        <flux:select wire:model="payroll_id" label="Payroll" placeholder="Select a payroll">
            <option value="">Select a payroll</option>
            @foreach ($payrolls as $payroll)
                <option value="{{ $payroll->id }}">{{ $payroll->payroll_period_start }}-{{ $payroll->payroll_period_end }}</option>
            @endforeach
        </flux:select>

        </div>

        <h1 class="text-xl mt-8">Salary Details</h1>
        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">
        <flux:input wire:model="salary_amount" label="Salary Amount" type="number" placeholder="Salary amount" />
        <flux:select wire:model="pay_frequency" label="Pay Frequency" placeholder="Select pay frequency">
            <option value="">Select a payment frequency</option>
            <option value="weekly">Weekly</option>
            <option value="daily">Daily</option>
            <option value="daily">Hourly</option>
        </flux:select>
        </div>

        <div class="flex">
            <flux:spacer />
            <flux:button type="submit" variant="primary">
                Add Employee
            </flux:button>
        </div>
    </form>
</div>
