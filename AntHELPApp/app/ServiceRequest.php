<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiceRequest extends Model
{
    use SoftDeletes;

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function service() {
        return $this->belongsTo('App\Service', 'service_id');
    }

    protected $dates = ['deleted_at'];
}
