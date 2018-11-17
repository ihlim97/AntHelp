<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServiceRequest extends Model
{
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function service() {
        return $this->belongsTo('App\Service', 'service_id');
    }
}
