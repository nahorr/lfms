<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
   public function pay_stacks()
    {
        return $this->hasMany('App\PayStack');
    }

}
