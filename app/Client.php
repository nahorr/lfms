<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function client_cases()
    {
        return $this->hasMany('App\ClientCase');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function client_services()
    {
        return $this->hasMany('App\ClientService');
    }
}
