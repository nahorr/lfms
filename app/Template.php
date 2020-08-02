<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
	use SoftDeletes;
	
    public function template_category()
    {
    	return $this->belongsTo('App\TemplateCategory');
    }

    public function company()
    {
    	return $this->belongsTo('App\Company');
    }
}
