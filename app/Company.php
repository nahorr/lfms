<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
	protected $fillable = [
        'company_name', 'city', 'phone', 'created_at',
    ];

    public function users()
    {
        return $this->hasMany('App\User');
    }

    public function client_cases()
    {
        return $this->hasMany('App\ClientCase');
    }

    public function templatecategories()
    {
        return $this->hasmany('App\TemplateCategory');
    }

    public function templates()
    {
        return $this->hasmany('App\Template');
    }

    public function subscriptions()
    {
        return $this->hasMany('App\Subscription');
    }

    public function clients()
    {
        return $this->hasMany('App\Client');
    }
}
