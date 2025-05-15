<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RanPayrolls extends Model
{
    use HasFactory;

    protected $fillable = [
        'payroll_id',
    ];

    public function details()
    {
        return $this->hasMany(PayrollDetail::class);
    }

    public function payroll()
    {
        return $this->belongsTo(Payroll::class);
    }
}
