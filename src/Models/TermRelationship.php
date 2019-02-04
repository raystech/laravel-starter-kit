<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;
use Raystech\StarterKit\Traits\TaxonomyFinder;

class TermRelationship extends Model
{
  use TaxonomyFinder;
  
	protected $fillable = ['model_type', 'model_id', 'term_taxonomy_id', 'term_order'];

  public function taxonomy() {
    return $this->hasOne('Raystech\StarterKit\Models\TermTaxonomy', 'term_taxonomy_id');
  }
}
