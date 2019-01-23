<?php

namespace Raystech\StarterKit\Events;

use Raystech\StarterKit\Models\Term;
use Illuminate\Queue\SerializesModels;

class TermHasBeenAdded
{
    use SerializesModels;

    public $term;

    public function __construct(Term $term)
    {
        $this->term = $term;
    }
}
