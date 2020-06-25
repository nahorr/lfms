<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateCategory extends Model
{
    public function company()
    {
    	return $this->belongsTo('App\Company');
    }

    public function templates()
    {
    	return $this->hasMany('App\Template');
    }
}
