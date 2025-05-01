<div>
  <flux:button icon="arrow-uturn-left" class="mb-3" onclick="history.back()"></flux:button>
  
  <div class="mb-8 animate-fade-in">
    <h1 class="text-2xl font-semibold text-slate-800 dark:text-slate-100 transition-colors duration-300 flex">
        {{ $department->name }}
        <livewire:admin.departments-and-positions.edit-department :variant="'ghost'" :department="$department" />
    </h1>
    <p class="mt-2 text-slate-500 dark:text-slate-400 transition-colors duration-300">
        {{ $department->description }}
    </p>
  </div>

      {{-- Make action bar layout --}}
    <div class="my-4">
        <livewire:admin.departments-and-positions.add-position :department="$department" />
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
                            {{ __('Position') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Description') }}
                        </th>
                        <th
                            class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Clock in time') }}
                        </th>
                        <th
                            class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-300 uppercase tracking-wider transition-colors duration-300">
                            {{ __('Actions') }}
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-slate-800 divide-y divide-slate-200 dark:divide-slate-700">
                    <!-- Table Row with enter animation -->
                    @foreach ($positions as $position)
                    <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/30 transition-all duration-200 animate-enter">
                        <td
                            style="cursor:pointer" onclick="document.location.href='{{ route('dashboard.config.position-detail', [$department->id, $position->id]) }}'"
                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-800 dark:text-slate-100 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 hover:underline">
                                {{ $position->name }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300 w-1/3">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1 text-pretty">
                                {{ $position->description }}
                            </span>
                            
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-sm text-slate-600 dark:text-slate-300 transition-colors duration-300">
                            <span class="inline-block transition-transform duration-300 hover:translate-x-1">
                              {{ $position->shift_clock_in_time }}
                            </span>
                        </td>
                        <td
                            class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium transition-colors duration-300">
                            <div class="flex justify-end space-x-2">
                                <livewire:admin.departments-and-positions.edit-position :variant="'filled'" :department="$department" :position="$position" />
                                <livewire:admin.departments-and-positions.delete-position :variant="'filled'" :department="$department" :position="$position" />
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>