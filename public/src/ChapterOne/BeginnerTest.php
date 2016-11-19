<?php

namespace Oopphp\ChapterOne;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * This class is nothing more than a 'degenerate' class meant to test that the testing framework is up and running.
 * Class BeginnerTest
 * @package Oopphp\ChapterOne
 */
class BeginnerTest
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