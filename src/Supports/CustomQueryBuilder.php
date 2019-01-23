<?php

namespace Raystech\StarterKit\Supports;

class CustomQueryBuilder
{
  private $relation_counter = 0;
  public function apply($query, $data) {
    $keyword = request('q');
    $data_filters = $data['allowedFilters'];

    $filter_prep = [
      'column'   => '',
      'operator' => 'contains',
      'query_1'  => '',
      'match'    => 'or', 
    ];

    foreach ($data_filters as $filter) {
      $filter_prep['column'] = $filter;
      $filter_prep['query_1'] = $keyword;
      $this->makeFilter($query, $filter_prep);
    }

    if(isset($data['f'])) {
      foreach ($data['f'] as $filter) {
        $filter['match'] = $data['filter_match'] ?? 'and';
        $this->makeFilter($query, $filter);
      }
    }

    // dd($this->relation_counter);
    return $query;
  }

  public function makeFilter($query, $filter) {
    if(strpos($filter['column'], '.') !== false) {
      // nested column
      list($relation, $filter['column']) = explode('.', $filter['column']);
      $filter['match'] = 'and';
      // $filter['match'] = 'or';

      if($filter['column'] == 'count') {
        $this->{camel_case($filter['operator'])}($filter, $query, $relation);

      } else {
        if($this->relation_counter == 0) {
          $query->whereHas($relation, function($q) use ($filter) {
            $this->{camel_case($filter['operator'])}($filter, $q);
          });
        } else {
          $query->orWhereHas($relation, function($q) use ($filter) {
            $this->{camel_case($filter['operator'])}($filter, $q);
          });
        }
        $this->relation_counter++;
      }
    } else {
      $this->relation_counter++;
      // normal column
      $this->{camel_case($filter['operator'])}($filter, $query);
    }
  }

  public function equalTo($filter, $query) {
    return $query->where($filter['column'], '=', $filter['query_1'], $filter['match']);
  }

  public function notEqualTo($filter, $query) {
    return $query->where($filter['column'], '<>', $filter['query_1'], $filter['match']);
  }

  public function lessThan($filter, $query) {
    return $query->where($filter['column'], '<', $filter['query_1'], $filter['match']);
  }

  public function greaterThan($filter, $query) {
    return $query->where($filter['column'], '>', $filter['query_1'], $filter['match']);
  }

  public function between($filter, $query) {
    return $query->whereBetween($filter['column'], [
      $filter['query_1'], $filter['query_2']
    ], $filter['match']);
  }

  public function notBetween($filter, $query) {
    return $query->whereNotBetween($filter['column'], [
      $filter['query_1'], $filter['query_2']
    ], $filter['match']);
  }

  public function contains($filter, $query) {
    return $query->where($filter['column'], 'like', '%'.$filter['query_1'].'%', $filter['match']);
  }

  public function startsWith($filter, $query) {
    return $query->where($filter['column'], 'like', $filter['query_1'].'%', $filter['match']);
  }

  public function endsWith($filter, $query) {
    return $query->where($filter['column'], 'like', '%'.$filter['query_1'], $filter['match']);
  }

  public function inThePast($filter, $query) {
    $end = now()->endOfDay();
    $begin = now();

    switch ($filter['query_2']) {
      case 'hours':
      $begin->subHours($filter['query_1']);
      break;
      case 'days':
      $begin->subDays($filter['query_1'])->startOfDay();
      break;
      case 'months':
      $begin->subMonths($filter['query_1'])->startOfDay();
      break;
      case 'years':
      $begin->subYears($filter['query_1'])->startOfDay();
      break;
      default:
      $begin->subDays($filter['query_1'])->startOfDay();
      break;
    }

    return $query->whereBetween($filter['column'], [$begin, $end], $filter['match']);
  }

  public function inTheNext($filter, $query) {
    $begin = now()->startOfDay();
    $end = now();

    switch ($filter['query_2']) {
      case 'hours':
      $begin->addHours($filter['query_1']);
      break;
      case 'days':
      $begin->addDays($filter['query_1'])->endOfDay();
      break;
      case 'months':
      $begin->addMonths($filter['query_1'])->endOfDay();
      break;
      case 'years':
      $begin->addYears($filter['query_1'])->endOfDay();
      break;
      default:
      $begin->addDays($filter['query_1'])->endOfDay();
      break;
    }

    return $query->whereBetween($filter['column'], [$begin, $end], $filter['match']);
  }

  public function inThePeriod($filter, $query)
  {
    $begin = now();
    $end = now();

    switch ($filter['query_1']) {
      case 'today':
      $begin->startOfDay();
      $end->endOfDay();
      break;

      case 'yesterday':
      $begin->subDay(1)->startOfDay();
      $end->subDay(1)->endOfDay();
      break;

      case 'tomorrow':
      $begin->addDay(1)->startOfDay();
      $end->addDay(1)->endOfDay();
      break;
      
      case 'last_month':
      $begin->subMonth(1)->startOfMonth();
      $end->subMonth(1)->endOfMonth();
      break;

      case 'this_month':
      $begin->startOfMonth();
      $end->endOfMonth();
      break;

      case 'next_month':
      $begin->addMonth(1)->startOfMonth();
      $end->addMonth(1)->endOfMonth();
      break;

      case 'last_year':
      $begin->subYear(1)->startOfYear();
      $end->subYear(1)->endOfYear();
      break;

      case 'this_year':
      $begin->startOfYear();
      $end->endOfYear();
      break;

      case 'next_year':
      $begin->addYear(1)->startOfYear();
      $end->addYear(1)->endOfYear();
      break;

      default:
        # code...
      break;
    }

    return $query->whereBetween($filter['column'], [$begin, $end], $filter['match']);

  }

  public function equalToCount($filter, $query, $relation) {
    return $query->has($relation, '=', $filter['query_1']);
  }

  public function notEqualToCount($filter, $query, $relation) {
    return $query->has($relation, '<>', $filter['query_1']);
  }

  public function lessThanCount($filter, $query, $relation) {
    return $query->has($relation, '<', $filter['query_1']);
  }

  public function greaterThanCount($filter, $query, $relation) {
    return $query->has($relation, '>', $filter['query_1']);
  }
}