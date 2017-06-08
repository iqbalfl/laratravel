<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regency extends Model
{
  protected $table='regencies';

  public function place()
    {
        return $this->hasMany('App\Place');
    }
}
