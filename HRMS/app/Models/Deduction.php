<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deduction extends Model
{
    protected $fillable = ['deduct_item', 'amount'];

    public function employee() {
        return $this->belongsTo('App\Models\Employee');
    }
}
