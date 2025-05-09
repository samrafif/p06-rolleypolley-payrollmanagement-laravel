<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';

    protected $fillable = [
        'fullname',
        'phone_number',
        'hire_date',
        'address',
        'bank_name',
        'bank_number',
        'npwp',
        'position_id',
        'card_id',
    ];
    protected $casts = [
        'hire_date' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function salaries()
    {
        return $this->hasOne(Salary::class);
    }

    public function attendanceRecords()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function overtimeRecords()
    {
        return $this->hasMany(Overtime::class, 'employee_id');
    }

    public function leaveRequests()
    {
        return $this->hasMany(Leave::class, 'employee_id');
    }

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'employee_id');
    }

    public function employeeDeductions()
    {
        return $this->hasMany(EmployeeDeduction::class, 'employee_id');
    }
}
