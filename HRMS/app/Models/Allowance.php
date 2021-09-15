<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allowance extends Model
{
    protected $fillable = ['allowance_item','amount'];

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }
}
