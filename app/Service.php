<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
	use SoftDeletes;
	
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function client_services()
    {
    	return $this->hasMany('App\ClientService');
    }

    public function templates()
    {
        return $this->hasMany('App\Template');
    }
}
