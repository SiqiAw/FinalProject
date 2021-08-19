<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobtitle extends Model
{
    //
    protected $fillable=['jobtitle_name','department_id','description'];

    public function department(){
        return $this->belongsTo('App\Models\Department');
    }
}
