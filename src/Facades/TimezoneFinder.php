<?php

namespace FahriGunadi\TimezoneFinder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \FahriGunadi\TimezoneFinder\TimezoneFinder
 */
class TimezoneFinder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \FahriGunadi\TimezoneFinder\TimezoneFinder::class;
    }
}
