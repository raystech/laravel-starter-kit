<?php

namespace Raystech\StarterKit\Traits;

use Illuminate\Validation\ValidationException;

use Raystech\StarterKit\Supports\CustomQueryBuilder;

trait DataViewer
{
  public function scopeTenantFilter($query) {
    $tenant_id = session()->get('_tenant', 1);

    return $query->whereHas('tenant', function($sub_query) use ($tenant_id) {
      $this->checkTenant($tenant_id, $sub_query);
      // $sub_query->where('tenant_id', 1);
    })->get();
  }

  public function checkTenant($tenant_id, $query) {
    return $query->where('tenant_id', $tenant_id);
  }

  public function scopeAdvancedFilter($query) {
    return $this->process($query, request()->all())
      ->orderBy(
        request('order_column', 'created_at'),
        request('order_direction', 'desc')
      )
      ->paginate(request('limit', 16));
  }

  public function process($query, $data) {

    $v = validator()->make($data, [
      'order_column'    => 'sometimes|required|in:'.$this->orderableColumns(),
      'order_direction' => 'sometimes|required|in:asc,desc',
      'limit'           => 'sometimes|required|integer|min:1',

      'filter_match'    => 'sometimes|required|in:and,or',
      'f'               => 'sometimes|required|array',
      'f.*.column'      => 'required|in:'.$this->whiteListColumns(),
      'f.*.operator'    => 'required_with:f.*.column|in:'.$this->allowedOperators(),
      'f.*.query_1'     => 'required',
      'f.*.query_2'     => 'required_if:f.*.operator,between,not_between'
    ]);

    if($v->fails()) {
      return dd($v->messages()->all());
      throw new ValidationException;      
    }
    $data['allowedFilters'] = $this->allowedFilters;
    return (new CustomQueryBuilder)->apply($query, $data);
  }

  protected function whiteListColumns() {
    return implode(',', $this->allowedFilters);
  }

  protected function orderableColumns() {
    return implode(',', $this->orderable);
  }

  protected function allowedOperators() {
    return implode(',', [
      'equal_to',
      'not_equal_to',
      'less_than',
      'greater_than',
      'between',
      'not_between',
      'contains',
      'starts_with',
      'ends_with',
      'in_the_past',
      'in_the_next',
      'in_the_period',
      'less_than_count',
      'greater_than_count',
      'equal_to_count',
      'not_equal_to_count'
    ]);
  }
}