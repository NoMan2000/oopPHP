<?php

namespace Oopphp\ChapterFive;

require_once __DIR__ . "/../../../public/bootstrap.php";

/**
 * Class OutOfScopeReference
 * @package Oopphp\ChapterFive
 */
class OutOfScopeReference
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param string $name
     * @return mixed
     */
    function &__get(string $name)
    {
        if (array_key_exists($name, $this->items)) {
            $value =& $this->items[$name]; // Note the reference operator
        } else {
            $value = null; // First assign null to a variable
        }
        return $value; // Then return a reference to the variable
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    function __set(string $name, $value)
    {
        $this->items[$name] = $value;
    }

}
