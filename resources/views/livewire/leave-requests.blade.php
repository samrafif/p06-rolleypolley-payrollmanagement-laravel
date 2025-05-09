<div class="space-y-6 mx-32 my-16">
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4">
        Pending Leave Requests
    </h2>
    <div
        class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-200 dark:border-slate-700 overflow-hidden">
        <!-- Table with animated rows -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-700/50 backdrop-blur-sm">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Requesting Employee') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Leave Type') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Start Date') }}
                        </th>
                            <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Duration (days)') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Reason') }}
                        </th>
                        <th
                            class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($pendingLeaveRequests as $pendingLR)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-all duration-300 hover:translate-x-1 ease-in-out hover:underline">
                                {{ $pendingLR->employee->fullname }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300 w-1/3">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $pendingLR->leave_type }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ $pendingLR->start_date }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ (new DateTime($pendingLR->end_date))->diff(new DateTime($pendingLR->start_date))->format('%d'); }} Day(s)
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ $pendingLR->reason }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <div class="flex justify-end space-x-2">
                                <flux:button style="cursor:pointer" variant="filled" wire:click="approveLeaveRequest({{ $pendingLR->id }})" icon:leading="check">Approve</flux:button>
                                <flux:button style="cursor:pointer" variant="danger" wire:click="rejectLeaveRequest({{ $pendingLR->id }})" icon:leading="x-mark">Deny</flux:button>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 my-4">
        Processed Leave Requests
    </h2>
    <div
        class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-200 dark:border-slate-700 overflow-hidden">
        <!-- Table with animated rows -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-700/50 backdrop-blur-sm">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Requesting Employee') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Leave Type') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Start Date') }}
                        </th>
                            <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Duration (days)') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Reason') }}
                        </th>
                        <th
                            class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Status') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($processedLeaveRequests as $pendingLR)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-all duration-300 hover:translate-x-1 ease-in-out hover:underline">
                                {{ $pendingLR->employee->fullname }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $pendingLR->leave_type }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ $pendingLR->start_date }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ (new DateTime($pendingLR->end_date))->diff(new DateTime($pendingLR->start_date))->format('%d'); }} Day(s)
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ $pendingLR->reason }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <span style="color:{{ ($pendingLR->status == 'approved') ? 'lime' : 'red' }}" class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{ ucfirst($pendingLR->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
