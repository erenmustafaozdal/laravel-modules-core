<?php

namespace ErenMustafaOzdal\LaravelModulesCore\Facades;

use Illuminate\Support\Facades\Facade;

class Breadcrumb extends Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelmodulescore.breadcrumb';
    }
}