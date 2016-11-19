<?php

namespace Oopphp\ChapterThree;

require_once __DIR__ . '/../../../public/bootstrap.php';

use Oopphp\Contracts\AddContract;

/**
 * Class AddCalcDiff
 * @package Oopphp\ChapterThree
 */
class AddCalcDiff implements AddContract
{
    /**
     * @param array|\int[] ...$args
     * @return int
     */
    public function addInt(...$args) : int
    {
        return array_reduce($args, $sumArgs = function (int $previousValue, int $currentValue) {
            return $previousValue += $currentValue;
        }, 0);
    }

    /**
     * @param array|\float[] ...$args
     * @return float
     */
    public function addFloat(...$args) : float
    {
        return array_reduce($args, $sumArgs = function (float $previousValue, float $currentValue) {
            return $previousValue += $currentValue;
        }, 0);
    }

}
