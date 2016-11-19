<?php

namespace Oopphp\ChapterOne;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * This class is nothing more than a 'degenerate' class meant to test that the testing framework is up and running.
 * Class Beginner
 * @package Oopphp\ChapterOne
 */
class Beginner
{

    /**
     * @return bool
     */
    public function isTrue() : bool
    {
        return true;
    }

    /**
     * @return bool
     */
    public function isFalse() : bool
    {
        return false;
    }

    /**
     * @param bool $boolean
     * @return bool
     */
    public function isBool(bool $boolean): bool
    {
        return $boolean;
    }
}
