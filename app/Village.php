<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
  protected $table='villages';

  public function place()
    {
        return $this->hasMany('App\Place');
    }
}
