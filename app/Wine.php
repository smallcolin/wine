<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
  public function country()
  {
    return $this->belongsTo(Country::class)->withDefault();
  }

  public function customer()
  {
    return $this->belongsTo(Customer::class)->withDefault();
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  public function orders()
  {
    return $this->belongsToMany(Order::class);
  }

  protected $fillable = [
      'name', 'description', 'country_id', 'customer_id', 'price', 'stock', 'image_url', 'approved'
  ];
}
