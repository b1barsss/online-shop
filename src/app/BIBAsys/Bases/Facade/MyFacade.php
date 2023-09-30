<?php

namespace App\BIBAsys\Bases\Facade;

abstract class Multi extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeRoot()
    {
        $class = static::getFacadeAccessor();

        return new $class();
    }
}
