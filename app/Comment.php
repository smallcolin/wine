<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function wine()
  {
      return $this->belongsTo(Wine::class)->withDefault();
  }

  public function customer()
  {
      return $this->belongsTo(Customer::class)->withDefault();
  }

  protected $fillable = [
      'wine_id', 'customer_id', 'title', 'body', 'rating'
  ];
}
