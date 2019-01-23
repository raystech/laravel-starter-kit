<?php

namespace Raystech\StarterKit\Traits;

trait HasTenant
{
  /**
   * @return TenantRelationship relation
   */
  public function tenant() {
    $model_type = get_class($this);
    return $this->hasOne('App\Models\TenantRelationship', 'model_id')->where('model_type', $model_type);
  }
}