<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Facades;

use Illuminate\Support\Facades\Facade;

class Validation extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelmodulescore.validation';
    }
}