<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OnlineApplicant extends Model
{
    protected $fillable = [
        'name','ic','dob','gender','marital_status',
        'race','religion','nationality','email','phone_num',
        'address','city','state','zipcode','country',
        'position_applied', 'expected_salary','document',
        'image','emergency_contact_name','emergency_contact_number',
        'relation_emergency'];

    public function country() {
        return $this->belongsTo('App\Models\Country');
    }

    public function city() {
        return $this->belongsTo('App\Models\City');
    }

    public function state() {
        return $this->belongsTo('App\Models\State');
    }

    public function jobtitle() {
        return $this->belongsTo('App\Models\Jobtitle');
    }
}
