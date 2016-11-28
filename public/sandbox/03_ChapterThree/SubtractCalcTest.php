<?php
namespace ChapterThree;

use Codeception\Specify;
use Oopphp\ChapterThree\AddCalc;
use Oopphp\ChapterThree\AddCalcDiff;
use Oopphp\ChapterThree\SubtractCalc;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Subtract Calc Test";
require_once __DIR__ . '/../partials/header.php';

/**
 * @return object
 */
$before = function () {
    return new class {
        /**
         * @var SubtractCalc
         */
        public $subtractCalc;

        /**
         * @var SubtractCalc
         */
        public $subtractCalcDiff;

        /**
         *  constructor.
         */
        public function __construct()
        {
            $this->subtractCalc = new SubtractCalc(new AddCalc());
            $this->subtractCalcDiff = new SubtractCalc(new AddCalcDiff());
        }
    };
};

specify($statement = "Can subtract a list of numbers and return an integer, even if floating point numbers given", function () use ($statement, $before) {
    $class = $before();
    /**
     * @var $subtractCalc SubtractCalc
     */
    $subtractCalc = $class->subtractCalc;
    /**
     * @var $subtractCalcDiff SubtractCalc
     */
    $subtractCalcDiff = $class->subtractCalcDiff;
    verifyExt(
        $statement . ' <code>$subtractCalc->subtractInt(1, 2, 3)</code>',
        $subtractCalc->subtractInt(1, 2, 3)
    )->equals(-6)->e();

    verifyExt(
        $statement . ' <code>$subtractCalc->subtractInt(2.2, 2, 2)</code>',
        $subtractCalc->subtractInt(2.2, 2, 2)
    )->equals(-6)->e();

    verifyExt(
        $statement . ' <code>$subtractCalcDiff->subtractInt(1, 2, 3))->equals(-6)</code>',
        $subtractCalcDiff->subtractInt(1, 2, 3))->equals(-6)->e();

    verifyExt(
        $statement . ' <code>$subtractCalcDiff->subtractInt(2.2, 2, 2)</code>',
        $subtractCalcDiff->subtractInt(2.2, 2, 2)
    )->equals(-6)->e();
});

specify($statement = "Can subtract a list of numbers and return a float", function () use ($before, $statement) {
    $class = $before();
    /**
     * @var $subtractCalc SubtractCalc
     */
    $subtractCalc = $class->subtractCalc;
    /**
     * @var $subtractCalcDiff SubtractCalc
     */
    $subtractCalcDiff = $class->subtractCalcDiff;

    verifyExt(
        $statement . ' <code>$subtractCalc->subtractFloat(1, 2.2)</code>',
        $subtractCalc->subtractFloat(1, 2.2)
    )->equals(-3.2)->e();

    verifyExt(
        $statement . ' <code>$subtractCalcDiff->subtractFloat(1, 2.2)</code>',
        $subtractCalcDiff->subtractFloat(1, 2.2)
    )->equals(-3.2)->e();
});

specify($statement = "Can add a list of numbers and return an integer", function () use ($before, $statement) {
    $class = $before();
    /**
     * @var $subtractCalc SubtractCalc
     */
    $subtractCalc = $class->subtractCalc;
    /**
     * @var $subtractCalcDiff SubtractCalc
     */
    $subtractCalcDiff = $class->subtractCalcDiff;

    verifyExt(
        $statement . ' <code>$subtractCalc->addInt(1, 2, 3, 4)</code>',
        $subtractCalc->addInt(1, 2, 3, 4)
    )->equals(10)->e();

    verifyExt(
        $statement . ' <code>$subtractCalcDiff->addInt(1, 2, 3, 4)</code>',
        $subtractCalcDiff->addInt(1, 2, 3, 4)
    )->equals(10)->e();
});

specify($statement = "Can add a list of numbers and return a float", function () use ($before, $statement) {
    $class = $before();
    /**
     * @var $subtractCalc SubtractCalc
     */
    $subtractCalc = $class->subtractCalc;
    /**
     * @var $subtractCalcDiff SubtractCalc
     */
    $subtractCalcDiff = $class->subtractCalcDiff;

    verifyExt(
        $statement . ' <code>$subtractCalc->addFloat(1, 2, 3, 4.1)</code>',
        $subtractCalc->addFloat(1, 2, 3, 4.1)
    )->equals(10.1)->e();

    verifyExt(
        $statement . ' <code>$subtractCalcDiff->addFloat(1, 2, 3, 4.1)</code>',
        $subtractCalcDiff->addFloat(1, 2, 3, 4.1)
    )->equals(10.1)->e();

});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
