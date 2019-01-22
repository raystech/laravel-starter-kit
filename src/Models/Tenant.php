<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
  protected $fillable = [
    'tenant_name', 
    'tenant_domain', 
    'tenant_description'
  ];
}
