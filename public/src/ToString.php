<?php

namespace Oopphp;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class ToString
 * @package Oopphp
 */
class ToString
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return "test string";
    }
}
