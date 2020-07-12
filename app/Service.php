<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function client_services()
    {
    	return $this->hasMany('App\ClientService');
    }
}
