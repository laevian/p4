<?php

namespace Lichen;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
  public function project() {
      # File belongs to Project
      # Define an inverse one-to-many relationship.
      return $this->belongsTo('\Lichen\Project');
  }

  public function tags() {
    # With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
    return $this->belongsToMany('\Lichen\Tag')->withTimestamps();
  }
}
