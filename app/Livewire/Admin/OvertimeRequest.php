<?php

namespace App\Livewire\Admin;

use App\Models\Overtime;
use Livewire\Component;

class OvertimeRequest extends Component
{
    public $pendingOvertimeRequests = [];
    public $processedOvertimeequests = [];

    public function mount()
    {
        $this->pendingOvertimeRequests = Overtime::where('status', 'pending')->get();
        $this->processedOvertimeequests = Overtime::where('status', '!=', 'pending')->get();
    }

    // public function approveLeaveRequest($leaveId)
    // {
    //     $leave = Leave::find($leaveId);
    //     if ($leave) {
    //         $leave->status = 'approved';
    //         $leave->save();
    //         $this->mount(); // Refresh the data
    //     }
    // }
    // public function rejectLeaveRequest($leaveId)
    // {
    //     $leave = Leave::find($leaveId);
    //     if ($leave) {
    //         $leave->status = 'declined';
    //         $leave->save();
    //         $this->mount(); // Refresh the data
    //     }
    // }

    public function render()
    {
        return view('livewire.admin.overtime-request');
    }
}
