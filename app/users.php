<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
  protected $fillable = ['first_name', 'last_name'];
}
