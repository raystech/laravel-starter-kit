<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class TermRelationship extends Model
{
	protected $fillable = ['model_type', 'model_id', 'term_taxonomy_id', 'term_order'];
}
