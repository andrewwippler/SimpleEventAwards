<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function competition()
    {
      return $this->belongsTo('App\Competition');
    }

    public function divisions()
    {
      return $this->hasMany('App\Division');
    }


}
