<?php

require_once __DIR__ . '/../../bootstrap.php';

use Oopphp\ChapterThree\AddCalc;
use Oopphp\ChapterThree\AddCalcDiff;

$title = 'Add Calc Test';
require_once __DIR__ . '/../partials/header.php';

/**
 * @return object
 */
$before = function () {
    return new class {
        /**
         * @var AddCalc
         */
        public $addCalc;
        /**
         * @var AddCalcDiff
         */
        public $addCalcDiff;

        /**
         *  constructor.
         */
        public function __construct()
        {
            $this->addCalc = new AddCalc();
            $this->addCalcDiff = new AddCalcDiff();
        }
    };

};


specify($statement = "Can add a variable range of numbers and return an integer", function () use ($before, $statement) {
    verifyExt(
        $statement . '  <code>$before()->addCalc->addInt("25"))->equals(25)</code>',
        $before()->addCalc->addInt('25')
    )->equals(25)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalc->addInt(25, 10, 33)</code>',
        $before()->addCalc->addInt(25, 10, 33)
    )->equals(68);

    verifyExt(
        $statement . ' <code>$before()->addCalc->addInt(10, -10)</code>',
        $before()->addCalc->addInt(10, -10)
    )->equals(0)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalc->addInt(10.5, 1.2)</code>',
        $before()->addCalc->addInt(10.5, 1.2)
    )->equals(11)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalc->addInt(2.2)</code>',
        $before()->addCalc->addInt(2.2)
    )->internalType('integer')->e();

    verifyExt(
        $statement . ' <code>$before()->addCalcDiff->addInt("25")</code>',
        $before()->addCalcDiff->addInt('25')
    )->equals(25)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalcDiff->addInt(25, 10, 33)</code>',
        $before()->addCalcDiff->addInt(25, 10, 33)
    )->equals(68)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalcDiff->addInt(10, -10)</code>',
        $before()->addCalcDiff->addInt(10, -10)
    )->equals(0)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalcDiff->addInt(10.5, 1.2)</code>',
        $before()->addCalcDiff->addInt(10.5, 1.2)
    )->equals(11)->e();

    verifyExt(
        $statement . ' <code>$before()->addCalcDiff->addInt(2.2)</code>',
        $before()->addCalcDiff->addInt(2.2)
    )->internalType('integer')->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
