<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $table = 'leave_requests';

    protected $fillable = [
        'employee_id',
        'leave_type',
        'start_date',
        'end_date',
        'duration_hours',
        'reason',
        'status',
        'approval_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
