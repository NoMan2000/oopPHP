<?php

namespace Oopphp;

require_once __DIR__ . '/../bootstrap.php';

/**
 * Class ChildAbstractClass
 * @package Oopphp
 */
class ChildAbstractClass extends AbstractClass
{
    // Notice we can overwrite a protected variable
    protected $myVariable = "var";
    /**
     * getData must either be implemented or it must be declared abstract
     * @return array
     */
    public function getData() : array
    {
        return [
            'privateVariable' => $this->getHiddenVariable(),
            'protectedVariable' => $this->getMyVariable(),
        ];
    }

    /**
     * @return string
     */
    public function getMyVariable() : string
    {
        parent::setMyVariable("old value");
        $parentValue = parent::getMyVariable(); // Note that this has to be parent, if you tried it with $this, you'd get an infinite loop.
        return $parentValue .= " new value";
    }

}
