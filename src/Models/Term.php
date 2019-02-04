<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Raystech\StarterKit\Traits\CustomSlugify;
use Raystech\StarterKit\Traits\TaxonomyFinder;

class Term extends Model
{
  use Sluggable;
  use CustomSlugify;
  use TaxonomyFinder;
  
  protected $fillable = ['name', 'slug', 'term_group'];

  public function meta() {
    return $this->hasMany('App\Models\TermMeta');
  }
  public function taxonomy() {
    return $this->belongsTo('Raystech\StarterKit\Models\TermTaxonomy', 'id', 'term_id');
  }
  public function sluggable()
  {
    return [
      'slug' => [
        'source' => 'name',
        'method' => function ($string, $separator) {
          return $this->slugify_th($string, $separator);
        }
      ]
    ];
  }

  
}
