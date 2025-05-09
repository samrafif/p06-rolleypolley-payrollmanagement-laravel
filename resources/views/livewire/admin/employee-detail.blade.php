<div>
    {{-- Stop trying to control. --}}
    <flux:button icon="arrow-uturn-left" class="mb-3" onclick="history.back()"></flux:button>
    <x-page-heading pageHeading="{{ $employee->fullname }}" pageDesc="Complete cmployee details"></x-page-heading>

    {{-- TODO: Perhaps make THIS into the edit employee page, akin to the CompanySetting page --}}
    {{-- TODO: Implement Later --}}

    <h2 class="text-2xl font-bold">Contact Details</h2>
    <span>Email: {{ $employee->user }}</span> <br/>
    <span>Phone: {{ $employee->phone_number }}</span>
    <h2 class="text-2xl font-bold">Bank Details</h2>
</div>
