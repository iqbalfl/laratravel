<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Confirmation extends Model
{
    //
    protected $fillable = ['transaction_id','payment_method','info','paid_total'];

    public function transaction()
      {
        return $this->belongsTo('App\Transaction');
      }
}
