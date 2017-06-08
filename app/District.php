<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
  protected $table='districts';

  public function place()
    {
        return $this->hasMany('App\Place');
    }
}
