<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
  //mass assignment
  protected $fillable = ['name','car_type_id','sheet','cost','status'];

  public function car_type()
    {
      return $this->belongsTo('App\Car_type');
    }

  public function transaction()
    {
        return $this->hasOne('App\Transaction');
    }
}
