<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = ['employee_id', 'employee_name', 'department', 'jobtitle',
    'status', 'basic_salary', 'deduction', 'allowance', 'gross', 'net',
    'month', 'year'];

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }
}
