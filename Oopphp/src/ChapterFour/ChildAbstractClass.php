<?php

namespace Oopphp\ChapterFour;

require_once __DIR__ . '/../../../public/bootstrap.php';

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

}
