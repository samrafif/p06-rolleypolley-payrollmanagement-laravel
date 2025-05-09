<?php

namespace App\Livewire\Admin;

use App\Models\Leave;
use Livewire\Component;

class LeaveRequests extends Component
{
    public $pendingLeaveRequests = [];
    public $processedLeaveRequests = [];

    public function mount()
    {
        $this->pendingLeaveRequests = Leave::where('status', 'pending')->get();
        $this->processedLeaveRequests = Leave::where('status', '!=', 'pending')->get();
    }

    public function approveLeaveRequest($leaveId)
    {
        $leave = Leave::find($leaveId);
        if ($leave) {
            $leave->status = 'approved';
            $leave->save();
            $this->mount(); // Refresh the data
        }
    }
    public function rejectLeaveRequest($leaveId)
    {
        $leave = Leave::find($leaveId);
        if ($leave) {
            $leave->status = 'declined';
            $leave->save();
            $this->mount(); // Refresh the data
        }
    }


    public function render()
    {
        return view('livewire.admin.leave-requests', [
            'pendingLeaveRequests' => $this->pendingLeaveRequests,
            'processedLeaveRequests' => $this->processedLeaveRequests,
        ]);
    }
}
