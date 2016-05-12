<?php

namespace Lichen;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  public function files() {
  return $this->belongsToMany('\Lichen\File')->withTimestamps();
  }
}
