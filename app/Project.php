<?php

namespace Lichen;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  public function files() {
    # Project has many Files
    # Define a one-to-many relationship.
    return $this->hasMany('\Lichen\File');
  }
}
