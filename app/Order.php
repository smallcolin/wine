<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function wine()
  {
    return $this->belongsToMany(Wine::class)->withDefault();
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class)->withDefault();
  }
}
