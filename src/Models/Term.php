<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Traits\CustomSlugify;

class Term extends Model
{
  use Sluggable;
  use CustomSlugify;
  
  protected $fillable = ['name', 'slug', 'term_group'];

  public function meta() {
    return $this->hasMany('App\Models\TermMeta');
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
