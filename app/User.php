<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable //implements MustVerifyEmail 
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'company_id', 'group_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function group()
    {
        return $this->belongsTo('App\Group');
    }

    public function clientcases()
    {
        return $this->hasMany('App\ClientCase');
    }

    public function client_services()
    {
        return $this->hasMany('App\ClientService');
    }

}
