<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function wines()
  {
    $this->hasMany(Wine::class);
  }
}
