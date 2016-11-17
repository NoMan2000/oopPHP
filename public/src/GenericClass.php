<?php

namespace Oopphp;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class GenericClass
 * @package Oopphp
 */
class GenericClass
{
    /**
     * @var int
     */
    private $intProperty = 0;

    /**
     * @return int
     */
    public function getIntProperty(): int
    {
        return $this->intProperty;
    }

    /**
     * @param int $intProperty
     * @return GenericClass
     */
    public function setIntProperty(int $intProperty): GenericClass
    {
        $this->intProperty = $intProperty;
        return $this;
    }


}
