<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function wines()
  {
      return $this->belongsTo(Wine::class)->withDefault();
  }
}
