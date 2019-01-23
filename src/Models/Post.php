<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Raystech\StarterKit\Traits\CustomSlugify;

class Post extends Model
{
  use CustomSlugify;
  use Sluggable;

  protected $fillable = [
    'post_author', 'post_content', 'post_title', 
    'post_excerpt', 'post_status', 'comment_status', 'ping_status', 'post_password', 
    'post_name', 'to_ping', 'pinged',
    'post_content_filtered', 'post_parent', 'guid', 'menu_order', 'post_type', 'post_mime_type', 'comment_count'
  ];
  
  public static function boot()
  {
    parent::boot();

    self::creating(function($model){
      // ... code here
    });

    self::created(function($model){
      // ... code here
    });

    self::updating(function($model){
      // ... code here
    });

    self::updated(function($model){
      // ... code here
    });

    self::deleting(function($model){
      // ... code here
    });

    self::deleted(function($model){
      // ... code here
    });
  }

  public function sluggable()
  {
    return [
      'post_name' => [
        'source' => 'post_title',
        'method' => function ($string, $separator) {
          return $this->slugify_th($string, $separator);
        }
      ]
    ];
  }
}
