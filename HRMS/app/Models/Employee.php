<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use Notifiable;

    protected $guard = 'blogger';

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillableEmployee = ['employeeID', 'ic', 'employee_Name', 'image', 
    'gender', 'date_of_birth', 'race', 'country', 'national', 
    'address', 'contact_number', 'email', 'department', 'jobtitle', 
    'salary', 'start_Date', 'end_Date', 'emergency_Name', 
    'emergency_Contact_Number', 'document', 'employment', 
    'marital_status', 'leave_grade', 'employee_grade',
    'epf_account_number','workingSchedule'];

}
