<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
  //mass assignment
  protected $fillable = ['name','description','category_id','province_id','regency_id','district_id','village_id','cost','admin_id'];

  public function category()
    {
      return $this->belongsTo('App\Category');
    }

  public function user()
    {
      return $this->belongsTo('App\User');
    }

  public function transaction()
    {
        return $this->hasMany('App\Transaction');
    }

  //eager loading relation for all state
    public function province()
      {
        return $this->belongsTo('App\Province');
      }
    public function regency()
      {
        return $this->belongsTo('App\Regency');
      }
    public function district()
      {
        return $this->belongsTo('App\District');
      }
    public function village()
      {
        return $this->belongsTo('App\Village');
      }
}
