<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wine extends Model
{
  public function country()
  {
    return $this->belongsTo(Country::class)->withDefault();
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function comments()
  {
    return $this->hasMany(Comment::class);
  }

  protected $fillable = [
      'name', 'description', 'country_id', 'price', 'stock', 'image_url'
  ];
}
