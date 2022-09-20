<?php

namespace App\Scopes;

trait FilterSearchScope
{
    protected static function bootFilterSearchScope()
    {
        static::addGlobalScope(new SearchScope);
        static::addGlobalScope(new FilterScope);
    }

}