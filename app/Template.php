<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function template_category()
    {
    	return $this->belongsTo('App\TemplateCategory');
    }
}
