<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Employee extends Model
{
    
    protected $fillable = ['employeeID', 'ic', 'employee_Name', 'image', 
    'gender', 'date_of_birth', 'race', 'country', 'national', 
    'address', 'contact_number', 'email', 'department', 'jobtitle', 
    'salary', 'start_Date', 'end_Date', 'emergency_Name', 
    'emergency_Contact_Number', 'document', 'employment', 
    'marital_status', 'leave_grade', 'employee_grade',
    'epf_account_number','workingSchedule'];

    public function allowance() {
        return $this->hasMany('App\Models\Allowance');
    }

    public function deduction() {
        return $this->hasMany('App\Models\Deduction');
    }

    public function overtime() {
        return $this->hasMany('App\Models\Overtime');
    }

    public function payroll() {
        return $this->hasMany('App\Models\Payroll');
    }

}
