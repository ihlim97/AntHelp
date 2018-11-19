<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $casts = [
        'rate' => 'decimal:5'
    ];

    public function serviceProvider() {
        return $this->belongsTo('App\ServiceProvider', 'user_id');
    }

    public function serviceRequests() {
        return $this->hasMany('App\ServiceRequest', 'service_id');
    }
}
