<?php

namespace Oopphp\ChapterNine;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class AbstractAnonClassFactory
 * @package Oopphp\ChapterNine
 */
abstract class AbstractAnonClassFactory
{
    /**
     * @var
     */
    protected $class;

    /**
     * AnonGenerator constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        $this->class = $this->createAnonymousClass();
        foreach ($items as $key => $value) {
            $methodName = 'set' . $key;
            if (method_exists($this->class, $methodName)) {
                $this->class->$methodName($value);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @return mixed
     */
    abstract protected function createAnonymousClass();
}
