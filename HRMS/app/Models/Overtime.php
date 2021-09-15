<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $fillable = ['date_overtime', 'employee_id', 'employee_name', 'hours', 'rate'];

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }
}
