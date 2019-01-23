<?php

namespace Raystech\StarterKit\Facades;

use Illuminate\Support\Facades\Facade;

class StarterKitFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'StarterKit';
    }
}
