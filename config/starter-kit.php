<?php

return [
  'routes' => [
    'prefix' => 'admin',
    'name_prefix' => 'rt-admin',
  ],
  'models' => [
    'term'                => Raystech\StarterKit\Models\Term::class,
    'term_meta'           => Raystech\StarterKit\Models\TermMeta::class,
    'term_relationship'   => Raystech\StarterKit\Models\TermRelationship::class,
    'term_taxonomy'       => Raystech\StarterKit\Models\TermTaxonomy::class,

    'tenant'              => Raystech\StarterKit\Models\Tenant::class,
    'tenant_relationship' => Raystech\StarterKit\Models\TermRelationship::class,
  ]
];