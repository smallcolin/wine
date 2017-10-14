<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'password', 'remember_token',
  ];

  // RELATIONSHIPS
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
    return $this->hasMany(Wine::class);
  }
}
