<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;

    protected $table = 'salaries';

    protected $fillable = [
        'employee_id',
        'amount',
        'pay_frequency',
        'effective_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
