<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deduction extends Model
{
    use HasFactory;

    protected $table = 'deductions';

    protected $fillable = [
        // 'employee_id',
        'description',
        'amount',
    ];

    public function employeeDeductions()
    {
        return $this->hasMany(EmployeeDeduction::class, 'employee_id');
    }
}
