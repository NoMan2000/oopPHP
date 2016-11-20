<?php

namespace Oopphp\ChapterNine;

require_once __DIR__ . '/../../../public/bootstrap.php';

/**
 * Class FibonacciGenerator
 * @package Oopphp\ChapterNine
 */
class FibonacciGenerator
{
    /**
     * @param int $until
     * @return \Generator|null
     */
    public function getSequence($until = 1)
    {
        $current = 1;
        $previous = 0;
        yield 0 => 1;
        for ($i = 1; $i <= $until; $i += 1) {
            yield $i => $current;
            $temp = $current;
            $current = $previous + $current;
            $previous = $temp;
        }
        return null;
    }
}

