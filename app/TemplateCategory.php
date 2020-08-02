<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TemplateCategory extends Model
{
	use SoftDeletes;
	
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function templates()
    {
    	return $this->hasMany('App\Template');
    }
}
