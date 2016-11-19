<?php

namespace Oopphp\ChapterFive;

require_once __DIR__ . "/../../../public/bootstrap.php";

/**
 * Class OutOfScope
 * @package Oopphp\ChapterFive
 */
class OutOfScope
{
    /**
     * @var array
     */
    protected $items = [];

    /**
     * @param string $name
     * @return mixed
     */
    function __get(string $name)
    {
        return isset($this->items[$name]) ? $this->items[$name] : null;
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
