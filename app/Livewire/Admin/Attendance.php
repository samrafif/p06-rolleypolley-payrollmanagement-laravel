<?php

namespace App\Livewire\Admin;

use App\Models\Attendance as ModelsAttendance;
use Livewire\Component;

class Attendance extends Component
{

    public $data = [
        'labels' => ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        'datasets' => [
            [
                'label' => 'Sales',
                'backgroundColor' => '#f87979',
                'data' => [12, 19, 3, 5, 2, 3, 11],
            ]
        ]
    ];

    public $attendances;
    public $attendances_heatmap;

    public function mount()
    {
        $this->attendances = ModelsAttendance::all()->where('attendance_date', '>', now()->subDays(30)->endOfDay());
        $this->attendances_heatmap = [];

        // iterate thru attendances
        foreach ($this->attendances as $attendance) {
            $this->attendances_heatmap[$attendance->attendance_date] = 0;
        }

        // iterate thru attendances
        foreach ($this->attendances as $attendance) {
            $this->attendances_heatmap[$attendance->attendance_date] = $this->attendances_heatmap[$attendance->attendance_date] + 1;
        }

        error_log(json_encode($this->attendances_heatmap));
    }

    public function render()
    {
        return view('livewire.admin.attendance');
    }
}
