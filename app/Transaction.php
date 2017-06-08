<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
      //mass assignment
      protected $fillable = ['user_id','place_id','car_id','total_participants','start_date','end_date','total_cost','admin_id','status'];

      public function user()
        {
          return $this->belongsTo('App\User');
        }

      public function admin()
        {
          return $this->belongsTo('App\User','admin_id');
        }

      public function place()
        {
          return $this->belongsTo('App\Place');
        }

      public function car()
        {
          return $this->belongsTo('App\Car');
        }

      public function confirmation()
        {
            return $this->hasOne('App\Confirmation');
        }
}
