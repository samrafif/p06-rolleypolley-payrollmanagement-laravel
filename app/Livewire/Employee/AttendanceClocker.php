<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use DateInterval;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class AttendanceClocker extends Component
{

    public $type; // Enum [check-in, check-out, overtime-check-in, overtime-check-out]
    private $lateThreshold = 15 * 60; // seconds

    public function mount()
    {
        $this->type = 'Select... ⬇️⬇️';
    }

    public function now()
    {
        // TODO: Make timezone congigurable from company settings
        return date_timezone_set(now(), timezone_open('Asia/Jakarta'));
    }

    public function setTz($time)
    {
        return date_timezone_set($time, timezone_open('Asia/Jakarta'));
    }

    #[On("clock-fire")]
    public function clockInOut($id)
    {
        error_log($this->type . ' for employee with ID: ' . $id);
        if (str_contains($this->type, 'Select')) {
            $this->type = 'Please Select a type below ⬇️⬇️';
            error_log('No type selected');
            return;
        }

        $employee = Employee::where('card_id', $id)->first();
        if (!$employee) {
            error_log('Employee NOT FOUND with ID: ' . $id);
            $this->type = 'CARD ID NOT FOUND';
            return;
        }

        // if 'check-in' (case sensitive)
        if (str_contains($this->type, 'check-in')) {
            // check if employee already checked in today
            $attendance = $employee->attendanceRecords()
                ->where('attendance_date', $this->now()->format('Y-m-d'))
                ->whereNotNull('check_in')
                ->first();
            if ($attendance) {
                error_log('Attendance already exists for employee with ID: ' . $id);
                error_log('Attendance ID: ' . $attendance->id);
                error_log('Attendance DATE: ' . $attendance->attendance_date);
                error_log('DATE NOW: ' . $this->now()->format('Y-m-d'));

                $this->type = 'ATTENDANCE CHECK-IN ALREADY EXISTS';
                return;
            }

            //  check if employee late or early
            $delta = strtotime($this->now()->format('H:i:s')) - strtotime($employee->position->shift_clock_in_time);
            error_log('Delta: ' . ($delta > 0 ? '+' : '-') . date('H_i_s', abs($delta)));

            // check if employee is late
            $notes = null;

            if ($delta > $this->lateThreshold) {
                // employee is late
                $notes = 'late:' . date('H_i_s', abs($delta));
                error_log('Employee is LATE: ' . $notes);
            } elseif ($delta < 0) {
                // employee is early
                $notes = 'early:' . date('H_i_s', abs($delta));
                error_log('Employee is EARLY: ' . $notes);
            }

            // check if employee is overtime
            if (str_contains($this->type, 'overtime')) {
                $notes = ($notes) ? $notes . ',overtime' : 'overtime';
                error_log('Employee is OVERTIME: ' . $notes);
            }

            // NOTE: Whoops baru tahu bisa gitu wok, lol whatevs, codesmell udah like shit
            $attendance = $employee->attendanceRecords()->create([
                'check_in' => $this->now(),
                'check_out' => null,
                'attendance_date' => $this->now()->format('Y-m-d'),
                'notes' => $notes, // notes, comma delimited list of flags, such as [overtime, late-check-in, late-check-out, ...]
            ]);
        }

        // if 'check-out' (case sensitive)
        if ($this->type == 'check-out') {
            $attendance = $employee->attendanceRecords()
                ->where('attendance_date', $this->now()->format('Y-m-d'))
                ->whereNull('check_out')
                ->first();

            // if not found, check for yesterday's attendance
            // NOTE: This is a workaround for the case when the employee forgets to check out / has a night-till-day shift
            if (!$attendance) {
                $attendance = $employee->attendanceRecords()
                    ->where('attendance_date', $this->now()->sub(DateInterval::createFromDateString('1 day'))->format('Y-m-d'))
                    ->whereNull('check_out')
                    ->first();
            }

            if ($attendance) {
                $attendance->update([
                    'check_out' => $this->now(),
                ]);
            } else {
                error_log('Attendance NOT FOUND for employee with ID: ' . $id);
                $this->type = 'ATTENDANCE NOT FOUND';
                return;
            }
        }

        // if 'overtime-check-out' (case sensitive) same as check-out
        // if 'check-out' (case sensitive)
        if ($this->type == 'overtime-check-out') {
            $attendance = $employee->attendanceRecords()
                ->where('attendance_date', now()->format('Y-m-d'))
                ->where('notes', 'overtime')
                ->whereNull('check_out')
                ->first();

            // if not found, check for yesterday's attendance
            // NOTE: This is a workaround for the case when the employee forgets to check out / has a night shift
            if (!$attendance) {
                $attendance = $employee->attendanceRecords()
                    ->where('attendance_date', now()->sub(DateInterval::createFromDateString('1 day'))->format('Y-m-d'))
                    ->whereNull('check_out')
                    ->first();
            }

            if ($attendance) {
                $attendance->update([
                    'check_out' => now(),
                ]);
            } else {
                error_log('Attendance NOT FOUND for employee with ID: ' . $id);
                $this->type = 'OVERTIME ATTENDANCE NOT FOUND';
                return;
            }
        }

        error_log('Employee FOUND: ' . $employee->fullname);
        $this->type = 'Select... ⬇️⬇️';
    }

    #[Layout('components.layouts.app.header')]
    public function render()
    {
        return view('livewire.employee.attendance-clocker');
    }
}
