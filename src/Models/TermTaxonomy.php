<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;

class TermTaxonomy extends Model
{
  protected $fillable = ['term_id', 'taxonomy', 'description', 'parent', 'count'];

  public function term() {
  	return $this->hasOne('App\Models\Term', 'id', 'term_id');
  }

  public function childs() {
  	return $this->hasMany('App\Models\TermTaxonomy', 'parent', 'term_id');
  }
}
