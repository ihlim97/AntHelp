<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    public function serviceProvider() {
        return $this->belongsTo('App\ServiceProvider', 'id');
    }
}
