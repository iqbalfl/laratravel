<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
      //mass assignment
      protected $fillable = ['user_id','place_id','car_id','total_participants','start_date','end_date','total_cost','admin_id','status'];

      //auto kode transaksi
      public function scopeGenerateCode($query)
      {
         $unique = false;
         while ($unique == false) {
            $code = base_convert(microtime(), 10, 36);
            $randomID = strtoupper(substr(uniqid($code), 0, 6));
            $check = $query->where('code',$randomID)->count();
            if ($check > 0) {
              $unique = false;
            } else {
              $unique = true;
            }
         }
         return $randomID;
      }


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
