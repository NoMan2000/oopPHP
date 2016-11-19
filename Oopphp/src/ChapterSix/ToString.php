<?php

namespace Oopphp\ChapterSix;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class ToString
 * @package Oopphp\ChapterSix
 */
class ToString
{
    /**
     * @return string
     */
    public function __toString() : string
    {
        return "test string";
    }
}
