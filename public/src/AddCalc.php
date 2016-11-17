<?php

namespace Oopphp;

use Oopphp\Contracts\AddContract;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class AddCalc
 * @package Oopphp
 */
class AddCalc implements AddContract
{
    /**
     * Note that array_sum will return the values as either an integer or a floating point number.
     * However, we specify in the return type that we want an integer, so PHP will convert it.
     * @param int[] ...$args
     * @return int
     */
    public function addInt(...$args) : int
    {
        return array_sum($args);
    }

    /**
     * @param float[] ...$args
     * @return float
     */
    public function addFloat(...$args) : float
    {
        return array_sum($args);
    }


}
