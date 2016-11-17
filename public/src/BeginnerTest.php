<?php

namespace Oopphp;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class BeginnerTest
 * @package Oopphp
 */
class BeginnerTest
{
    /**
     * @return bool
     */
    public function isTrue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isFalse() : bool
    {
        return false;
    }

    /**
     * @param bool $boolean
     * @return bool
     */
    public function isBool(bool $boolean): bool
    {
        return $boolean;
    }
}
