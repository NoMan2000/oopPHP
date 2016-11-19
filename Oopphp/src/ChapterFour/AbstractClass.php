<?php

namespace Oopphp\ChapterFour;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class AbstractClass
 * @package Oopphp
 */
abstract class AbstractClass
{
    /**
     * @var string
     */
    protected $myVariable;

    /**
     * @var string
     */
    private $_hiddenVariable;

    /**
     * @return mixed
     */
    public function getMyVariable()
    {
        return $this->myVariable;
    }

    /**
     * @param string $myVariable
     * @return AbstractClass
     */
    public function setMyVariable(string $myVariable) : AbstractClass
    {
        $this->myVariable = $myVariable;
        return $this;
    }

    /**
     * @return string
     */
    public function getHiddenVariable() : string
    {
        return $this->_hiddenVariable;
    }

    /**
     * @param string $hiddenVariable
     * @return AbstractClass
     */
    public function setHiddenVariable(string $hiddenVariable) : AbstractClass
    {
        $this->_hiddenVariable = $hiddenVariable;
        return $this;
    }

    /**
     * @return array
     */
    abstract public function getData() : array;

    /**
     * @return string
     */
    final public function getFinalFunction() : string
    {
        return "This is the final function";
    }

}
