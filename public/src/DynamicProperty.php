<?php

namespace Oopphp;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class DynamicProperty
 * @package Oopphp
 */
class DynamicProperty
{
    /**
     * Note that we never declare dynamic property
     * OutOfScope constructor.
     */
    public function __construct()
    {
        $this->dynamicProperty = 'bad';
    }
    /**
     * @return string
     */
    public function getDynamicProperty() : string
    {
        return $this->dynamicProperty;
    }
}
