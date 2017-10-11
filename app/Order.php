<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function wines()
  {
    return $this->hasMany(Wine::class);
  }
}
