<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
    public function events()
    {
      return $this->belongsTo('App\Event');
    }

    public function places()
    {
      return $this->hasMany('App\Place');
    }
}
