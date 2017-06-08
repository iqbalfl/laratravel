<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table='provinces';

    public function place()
      {
          return $this->hasMany('App\Place');
      }
}
