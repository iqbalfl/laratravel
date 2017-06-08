<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car_type extends Model
{
    protected $fillable = ['name'];

    public function car()
      {
        return $this->hasMany('App\Car');
      }
}
