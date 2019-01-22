<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class TermMeta extends Model
{
  protected $fillable = ['term_id', 'meta_key', 'meta_valu'];
}
