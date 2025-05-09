<div>
    <!-- Animated Page Heading -->
    <x-page-heading pageHeading="Salary Components" pageDesc="Manage your company's salary components here"></x-page-heading>

    {{-- Make action bar layout --}}
    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4">
        Allowances
    </h2>
    <div class="my-4">
        <livewire:admin.salary-components.add-allowance />
    </div>
    <div
        class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-200 dark:border-slate-700 overflow-hidden">
        <!-- Table with animated rows -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-700/50 backdrop-blur-sm">
                    <tr>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Name') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Description') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Amount') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Rule') }}
                        </th>
                        <th
                        class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($allowances as $allowance)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-all duration-300 hover:translate-x-1 ease-in-out hover:underline">
                                {{ $allowance->name }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300 w-1/3">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $allowance->description }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ ($allowance->rule == "fixed") ? $company_settings->currency_prefix : "" }} {{ number_format($allowance->amount) }} {{ ($allowance->rule == "percentage") ? "%" : "" }}
                            </span>
                        </td>
                        <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ $allowance->rule }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <div class="flex justify-end space-x-2">
                                <livewire:admin.salary-components.edit-allowance :allowance="$allowance" />
                                <livewire:admin.salary-components.delete-allowance :allowance="$allowance" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h2 class="text-lg font-semibold text-slate-800 dark:text-slate-100 mb-4 mt-8">
        Deductions
    </h2>

    <div class="my-4">
        <livewire:admin.salary-components.add-deduction />
    </div>
    <div
        class="bg-white dark:bg-slate-800 rounded-xl shadow-sm hover:shadow-md transition-shadow duration-300 border border-slate-200 dark:border-slate-700 overflow-hidden">
        <!-- Table with animated rows -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200 dark:divide-slate-700">
                <thead class="bg-slate-50 dark:bg-slate-700/50 backdrop-blur-sm">
                    <tr>
                        <th
                        class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Name') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Description') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Amount') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Rule') }}
                        </th>
                        <th
                        class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($deductions as $deduction)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-all duration-300 hover:translate-x-1 ease-in-out hover:underline">
                                {{ $deduction->name }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300 w-1/3">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $deduction->description }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ ($deduction->rule == "fixed") ? $company_settings->currency_prefix : "" }} {{ number_format($deduction->amount) }} {{ ($deduction->rule == "percent") ? "%" : "" }}
                            </span>
                        </td>
                        <td
                        class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ $deduction->rule }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <div class="flex justify-end space-x-2">
                                <livewire:admin.salary-components.edit-deduction :deduction="$deduction" />
                                <livewire:admin.salary-components.delete-deduction :deduction="$deduction" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add this to your CSS -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes enter {
            from {
                opacity: 0;
                transform: translateX(-10px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.4s ease-out forwards;
        }

        .animate-enter {
            animation: enter 0.3s ease-out forwards;
        }
    </style>
</div>