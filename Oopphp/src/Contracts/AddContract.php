<?php

namespace Oopphp\Contracts;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Interface AddContract
 * @package Oopphp\Contracts
 */
interface AddContract
{
    /**
     * @param int[] ...$args
     * @return int
     */
    public function addInt(...$args) : int;

    /**
     * @param float[] ...$args
     * @return float
     */
    public function addFloat(...$args) : float;
}
