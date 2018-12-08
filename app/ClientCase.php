<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientCase extends Model
{
	protected $dates = ['court_date'];

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }
}
