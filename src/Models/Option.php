<?php

namespace Raystech\StarterKit\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

use Raystech\StarterKit\Traits\CustomSlugify;
use Raystech\StarterKit\Traits\TimeHelperTraits;

class Option extends Model
{
  protected $fillable = ['option_name', 'option_value', 'option_type', 'autoload', 'tenant_id'];
  protected static $cacheTime = 60*24;
  private static $tenant_id = 1;

  public function tenant() {
    return $this->belongsTo('App\Models\Tenant', 'tenant_id');
  }
  
  public static function add($key, $val, $type = 'string')
  {
    if (self::has($key)) {
      return self::set($key, $val, $type);
    }

    return self::create(['option_name' => $key, 'option_value' => $val, 'option_type' => $type]) ? $val : false;
  }

  public static function get($key, $tenant_id = 1, $default = null)
  {
    // Cache::clear();
    if (self::has($key)) {
      // $option = self::getAllSettings()->where('option_name', $key)->first();
      self::$tenant_id = $tenant_id;

      // $option = Cache::tags('options')
      //   ->remember("option_{$tenant_id}_{$key}", static::$cacheTime, function() use ($key) {
      //   return self::getAllSettings()->where('option_name', $key)->first();
      // });
      $option = Cache::rememberForever("option_{$tenant_id}_{$key}", function() use ($key) {
        return self::getAllSettings()->where('option_name', $key)->first();
      });
      return self::castValue($option->option_value, $option->type);
    }

    return self::getDefaultValue($key, $default);
  }

  public static function set($key, $val, $type = 'string')
  {
    if ($option = self::getAllSettings()->where('option_name', $key)->first()) {
      return $option->update([
        'option_name' => $key,
        'option_value'  => $val,
        'option_type' => $type]) ? $val : false;
    }

    return self::add($key, $val, $type);
  }

  public static function remove($key)
  {
    if (self::has($key)) {
      return self::whereName($key)->delete();
    }

    return false;
  }

  public static function has($key)
  {
    return (boolean) self::getAllSettings()->whereStrict('option_name', $key)->count();
  }

  public static function getValidationRules()
  {
    return self::getDefinedSettingFields()->pluck('rules', 'option_name')
      ->reject(function ($val) {
        return is_null($val);
      })->toArray();
  }

  public static function getDataType($field)
  {
    $type = self::getDefinedSettingFields()
      ->pluck('data', 'option_name')
      ->get($field);

    return is_null($type) ? 'string' : $type;
  }

  public static function getDefaultValueForField($field)
  {
    return self::getDefinedSettingFields()
      ->pluck('value', 'option_name')
      ->get($field);
  }

  private static function getDefaultValue($key, $default)
  {
    return is_null($default) ? self::getDefaultValueForField($key) : $default;
  }

  private static function getDefinedSettingFields()
  {
    return collect(config('option_fields'))->pluck('elements')->flatten(1);
  }

  private static function castValue($val, $castTo)
  {
    switch ($castTo) {
      case 'int':
      case 'integer':
        return intval($val);
        break;

      case 'bool':
      case 'boolean':
        return boolval($val);
        break;

      default:
        return $val;
    }
  }

  public static function getAllSettings()
  {
    return self::where('tenant_id', self::$tenant_id)->get();
  }
}
