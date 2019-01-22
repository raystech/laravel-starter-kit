<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class TenantRelationship extends Model
{
  protected $fillable = [
    'model_type', 
    'model_id', 
    'tenant_id'
  ];
}
