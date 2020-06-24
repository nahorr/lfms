<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
	protected $dates = ['court_date'];

	public function company()
    {
    	return $this->belongsTo('App\Company');
    }
    
    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
