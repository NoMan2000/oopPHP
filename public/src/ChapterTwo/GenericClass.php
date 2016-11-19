<?php

namespace Oopphp\ChapterTwo;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * Class GenericClass
 * @package Oopphp
 */
class GenericClass
{
    /**
     * The underscore is used to mark a variable that is private in scope
     * @var int
     */
    private $_intProperty = 0;

    /**
     * @return int
     */
    public function getIntProperty(): int
    {
        return $this->_intProperty;
    }

    /**
     * @param int $_intProperty
     * @return GenericClass
     */
    public function setIntProperty(int $_intProperty): GenericClass
    {
        $this->_intProperty = $_intProperty;
        return $this;
    }


}
