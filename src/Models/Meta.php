<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
  protected $fillable = [
    'model_type', 
    'model_id', 
    'meta_key', 
    'meta_value'
  ];
}
