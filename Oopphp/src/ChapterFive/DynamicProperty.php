<?php

namespace Oopphp\ChapterFive;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class DynamicProperty
 * @package Oopphp\ChapterFive
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
