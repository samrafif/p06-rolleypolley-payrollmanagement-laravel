<!-- resources/views/livewire/leave-form.blade.php -->
<div class="space-y-6 mx-32 my-16">
    <div class="text-left">
        <flux:heading size="lg">Leave Request</flux:heading>
        <flux:text class="mt-2">Submit or update an employee's leave request.</flux:text>
    </div>

    <form wire:submit="submit" class="space-y-4">
        {{-- TODO: Take from currently logged in user --}}
        <flux:select
            wire:model="employee_id"
            label="Employee"
            placeholder="-- Select Employee --"
        >
            <option value="">-- Select Employee --</option>
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
            @endforeach
        </flux:select>
        @error('employee_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <flux:select
            wire:model="leave_type"
            label="Leave Type"
            placeholder="-- Select Type --"
        >
            <option value="">-- Select Type --</option>
            <option value="sakit">Sakit</option>
            <option value="cuti">Cuti</option>
            <option value="izin">Izin</option>
            <option value="dinas">Dinas</option>
        </flux:select>
        @error('leave_type') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <div class="grid grid-cols-2 gap-4">
            <div>
                <flux:input
                    type="date"
                    wire:model="start_date"
                    label="Start Date"
                />
                @error('start_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
            <div>
                <flux:input
                    type="date"
                    wire:model="end_date"
                    label="End Date"
                />
                @error('end_date') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <flux:textarea
            wire:model="reason"
            label="Reason"
            placeholder="Optional reason for leave"
        />
        @error('reason') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror

        <div class="flex justify-end">
            <flux:button type="submit" variant="primary">Submit Leave</flux:button>
        </div>
    </form>

    {{-- @if (session()->has('message'))
        <flux:alert type="success">
            {{ session('message') }}
        </flux:alert>
    @endif --}}
</div>