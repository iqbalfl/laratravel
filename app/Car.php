<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Car extends Model
{
  use Searchable;

  //mass assignment
  protected $fillable = ['name','car_type_id','sheet','cost','status'];

  public function searchableAs()
  {
     return 'cars_index';
  }

  public function car_type()
    {
      return $this->belongsTo('App\Car_type');
    }

  public function transaction()
    {
        return $this->hasOne('App\Transaction');
    }
}
