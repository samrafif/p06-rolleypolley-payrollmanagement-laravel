<div>
    <!-- Animated Page Heading -->
    <x-page-heading pageHeading="Manage Users" pageDesc="Manage your users"></x-page-heading>

    {{-- Make action bar layout --}}
    <div class="my-4">
        <livewire:admin.manage-users.add-user />
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
                            {{ __('Username') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Email') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Is Admin') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Associated Employee ID') }}
                        </th>
                        <th
                        class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($users as $user)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            style="cursor:pointer" onclick="document.location.href='{{ ($user->employee) ? route('dashboard.config.position-detail', [$user->employee->position->department->id, $user->employee->position->id]) : route('dashboard') }}'"
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-all duration-300 hover:translate-x-1 ease-in-out hover:underline">
                                {{ $user->name }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300 w-1/3">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $user->email }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ $user->is_admin ? 'Yes' : 'No' }}
                            </span>
                        </td>
                        <td
                        style="cursor:pointer" onclick="document.location.href='{{ ($user->employee) ? route('dashboard.config.position-detail', [$user->employee->position->department->id, $user->employee->position->id]) : route('dashboard.config.manage-users') }}'"
                        class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                                {{-- Calculate from length of positions array --}}
                                {{ $user->employee_id ? $user->employee_id : 'N/A' }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <div class="flex justify-end space-x-2">
                                <livewire:admin.manage-users.edit-user :user="$user" />
                                <livewire:admin.manage-users.delete-user :user="$user" />                                
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