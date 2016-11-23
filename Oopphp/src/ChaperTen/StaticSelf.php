<?php

namespace Oopphp\ChaperTen;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class StaticSelf
 * @package Oopphp\ChaperTen
 */
class StaticSelf
{

    /**
     * @return string
     */
    public static function getSelf() : string
    {
        return self::class;
    }

    /**
     * @return string
     */
    public static function getStatic() : string
    {
        return static::class;
    }

}
