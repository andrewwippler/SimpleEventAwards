<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
  public function divisions()
  {
    return $this->belongsTo('App\Division');
  }

}
