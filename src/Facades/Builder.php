<?php

namespace Sheenazien8\LivewireComponents\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Builder
 * @author sheenazien8
 */
class Builder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Builder';
    }
}
