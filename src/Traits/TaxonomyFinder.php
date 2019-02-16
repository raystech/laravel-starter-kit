<?php

namespace Raystech\StarterKit\Traits;

use Illuminate\Validation\ValidationException;

use Raystech\StarterKit\Supports\CustomQueryBuilder;

trait TaxonomyFinder
{
  public function scopeFindTaxonomy($query, $taxonomy_name) {
    return $query->whereHas('taxonomy', function($subq) use ($taxonomy_name) {
      $subq->where('taxonomy', $taxonomy_name);
    })->get();
  }

  public function scopeTermAssociated($query) {
    $query->join('term_taxonomies', 'term_taxonomies.id', '=', 'term_relationships.term_taxonomy_id')
      ->join('terms', 'term_taxonomies.term_id', '=', 'terms.id')
      ->select('term_relationships.*', 'term_taxonomies.taxonomy as taxonomy', 'terms.name as term_name');
  }
}