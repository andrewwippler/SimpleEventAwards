<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public function events()
    {
      return $this->hasMany('App\Event');
    }

    public function divisions()
    {
      return $this->hasManyThrough('App\Division', 'App\Event');
    }
}
