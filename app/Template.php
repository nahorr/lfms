<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
	use SoftDeletes;
	
    public function service()
    {
    	return $this->belongsTo('App\Service');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
