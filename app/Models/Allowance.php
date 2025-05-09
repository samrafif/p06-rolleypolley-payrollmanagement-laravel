<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Allowance extends Model
{
    use HasFactory;

    protected $table = 'allowances';

    protected $fillable = [
        // 'employee_id',
        'name',
        'description',
        'amount',
        'rule'
    ];

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'employee_id');
    }
}
