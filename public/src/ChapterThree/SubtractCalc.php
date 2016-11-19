<?php

namespace Oopphp\ChapterThree;

use Oopphp\Contracts\AddContract;
use Oopphp\Contracts\SubtractContract;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * Class SubtractCalc
 * @package Oopphp
 */
class SubtractCalc implements SubtractContract
{
    /**
     * @var AddContract
     */
    private $addCalc;

    /**
     * SubtractCalc constructor.
     * @param AddContract $addCalc
     */
    public function __construct(AddContract $addCalc)
    {
        $this->addCalc = $addCalc;
    }
    /**
     * @param int[] ...$args
     * @return int
     */
    public function addInt(...$args) : int
    {
        return $this->getAddCalc()->addInt(...$args);
    }

    /**
     * @param float[] ...$args
     * @return float
     */
    public function addFloat(...$args) : float
    {
        return $this->getAddCalc()->addFloat(...$args);
    }

    /**
     * @return AddContract
     */
    public function getAddCalc(): AddContract
    {
        return $this->addCalc;
    }

    /**
     * @param int[] ...$args
     * @return int
     */
    public function subtractInt(...$args) : int
    {
        return array_reduce($args, $removeValues = function($previousValue, $currentValue) {
            return $previousValue -= $currentValue;
        }, 0);
    }

    /**
     * @param float[] ...$args
     * @return float
     */
    public function subtractFloat(...$args) : float
    {
        return array_reduce($args, $removeValues = function($previousValue, $currentValue) {
            return $previousValue -= $currentValue;
        }, 0);
    }

}
