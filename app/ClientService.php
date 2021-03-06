<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientService extends Model
{
    use softDeletes;
    
    protected $dates = ['effective_date'];

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function service()
    {
    	return $this->belongsTo('App\Service');
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
