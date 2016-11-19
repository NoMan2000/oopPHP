<?php

namespace Oopphp\Contracts;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Interface SubtractContract
 * @package Oopphp\Contracts
 */
interface SubtractContract extends AddContract
{
    /**
     * @param int[] ...$args
     * @return int
     */
    public function subtractInt(...$args) : int;

    /**
     * @param float[] ...$args
     * @return float
     */
    public function subtractFloat(...$args) : float;
}
