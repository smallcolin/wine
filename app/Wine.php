<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
  public function country()
  {
    return $this->belongsTo(Country::class)->withDefault();
  }

  public function customers()
  {
    $this->belongsTo(Customer::class)->withDefault();
  }
  
  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  protected $fillable = [
      'name', 'description', 'country_id', 'price', 'stock', 'image_url'
  ];
}
