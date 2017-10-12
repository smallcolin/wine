<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function wines()
  {
      return $this->belongsTo(Wine::class)->withDefault();
  }

  public function customers()
  {
      return $this->belongsTo(Customer::class)->withDefault();
  }
}
