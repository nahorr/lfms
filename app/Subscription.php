<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
	use SoftDeletes;
	
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
