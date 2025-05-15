<?php

namespace App\Livewire\Admin\Attendance;

use Livewire\Component;

class DateDetail extends Component
{

    public $date;
    public $attendances;

    public function formatNotes($notes)
    {
        $notes = explode(',', $notes);

        $formatted_notes = [];
        foreach ($notes as $note) {
            $formatted_notes[] = str_replace([':', '_'], [': ', ':'], $note);
        }

        return ucfirst(implode('<br/>', $formatted_notes));
    }

    public function mount($date)
    {
        $this->date = $date;
        $this->attendances = \App\Models\Attendance::where('attendance_date', $date)->get();
    }

    public function render()
    {
        return view('livewire.admin.attendance.date-detail');
    }
}
