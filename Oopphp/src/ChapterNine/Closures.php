<?php

namespace Oopphp\ChapterNine;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class Closures
 * @package Oopphp\ChapterNine
 */
class Closures
{
    /**
     * @var \Closure
     */
    public $loadLocal;
    /**
     * @var \Closure
     */
    public $loadGlobal;

    /**
     * Closures constructor.
     */
    public function __construct()
    {
        $localVariable = 1;

        $this->loadLocal = function () use ($localVariable) {
            return $localVariable;
        };

        $this->loadGlobal = function () {
            global $localVariable;
            return $localVariable;
        };

    }
}
