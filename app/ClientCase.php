<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientCase extends Model
{
    use SoftDeletes;
    
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
