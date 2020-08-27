<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    function user() {
        return $this->belongsTo('App\User', 'specialist_id', 'id');
    }
}
