<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ServiceProvider extends Authenticatable
{
    use Notifiable;

    protected $guard = "serviceprovider";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'my_kad_no', 'mobile_no', 'address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function services() {
        return $this->hasMany('App\Service', 'user_id');
    }

    public function serviceRequests() {
        return $this->hasManyThrough('App\ServiceRequest', 'App\Service', 'user_id', 'service_id', 'id', 'id');
    }

}
