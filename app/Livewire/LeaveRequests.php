<?php

namespace App\Livewire;

use App\Models\Leave;
use Livewire\Attributes\Layout;
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

    #[Layout('components.layouts.app.header')]
    public function render()
    {
        return view('livewire.leave-requests', [
            'pendingLeaveRequests' => $this->pendingLeaveRequests,
            'processedLeaveRequests' => $this->processedLeaveRequests,
        ]);
    }
}
