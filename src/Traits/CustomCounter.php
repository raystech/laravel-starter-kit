<?php 

namespace Raystech\StarterKit\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Query\JoinClause;

trait CustomCounter
{
    
    protected static function bootCustomCounter() {
      static::created(function($item) {
        $class_name = static::class;
        $option = option(["_{$class_name}_count", option("_{$class_name}_count")+1]);
      });

      static::creating(function($item) {
        
      });
    }
}