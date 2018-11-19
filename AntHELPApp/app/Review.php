<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function serviceProvider() {
        return $this->belongsTo('App\ServiceProvider', 'service_provider_id');
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function serviceRequest() {
        return $this->hasOne('App\ServiceRequest', 'id', 'request_id');
    }
}
