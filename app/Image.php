<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
  protected $fillable = ['image_url', 'customer_id', 'filename', 'name', 'format', 'description'];

  public function customer()
  {
    return $this->belongsTo(Customer::class);
  }
}
