<?php

namespace Dunnit\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
  protected $fillable = ['text', 'done'];

  public function getDoneAttribute()
  {
    return $this->attribute['done'] ? "1" : "0";
  }
}
