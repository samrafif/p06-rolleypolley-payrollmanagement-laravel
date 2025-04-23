<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    use HasFactory;

    protected $table = 'allowances';

    protected $fillable = [
        // 'employee_id',
        'description',
        'amount',
    ];

    public function employeeAllowances()
    {
        return $this->hasMany(EmployeeAllowance::class, 'employee_id');
    }

}
