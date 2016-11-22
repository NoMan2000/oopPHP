<?php

use Oopphp\ChapterThree\AddCalc;
use Oopphp\ChapterThree\Calculator;
use Oopphp\ChapterThree\SubtractCalc;
use Oopphp\Contracts\OperationContract;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Test Calculator Class";
require_once __DIR__ . '/../partials/header.php';
/**
 * @return Calculator
 */
$before = function () {
    return new Calculator(new SubtractCalc(new AddCalc()));
};

specify($statement = "Given a negation operator, can perform integer subtractions", $exec = function () use ($before, $statement) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $result = $calc->calc('-', $calc::INT, 1, 2, 3, 4, 5, 6, 7);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("-", $calc::INT, 1, 2, 3, 4, 5, 6, 7)</code>',
        $result
    )->equals(-28));

    $resultTwo = $calc->calc('-', $calc::INT, 1, 2, 3, 4, 5, 6, 7.2);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("-", $calc::INT, 1, 2, 3, 4, 5, 6, 7.2)</code>',
        $resultTwo
    )->equals(-28));
});

specify($statement = "Given a negation operator, can perform floating point subtraction", function () use ($statement, $before) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();

    $result = $calc->calc("-", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("-", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7)</code>',
        $result
    )->equals(-28), true);

    $resultTwo = $calc->calc("-", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("-", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2)</code>',
        $resultTwo
    )->equals(-28.2));
});

specify($statement = "Given an addition operator, can perform integer additions", $exec = function () use ($before, $statement) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $result = $calc->calc("+", $calc::INT, 1, 2, 3, 4, 5, 6, 7);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("+", $calc::INT, 1, 2, 3, 4, 5, 6, 7)</code>',
        $result
    )->equals(28));

    $resultTwo = $calc->calc("+", $calc::INT, 1, 2, 3, 4, 5, 6, 7.2);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("+", $calc::INT, 1, 2, 3, 4, 5, 6, 7.2)</code>',
        $resultTwo
    )->equals(28));
});

specify($statement = "Given an addition operator, can perform floating point additions", $exec = function () use ($statement, $before) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $result = $calc->calc("+", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);
    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("+", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7)</code>',
        $result
    )->equals(28), true);

    $resultTwo = $calc->calc("+", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2);

    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc("+", $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7.2)</code>',
        $resultTwo
    )->equals(28.2));
});

specify($statement = "Will throw an Exception if the operation asked is not known", $exec = function () use ($statement, $before) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $badMethod = function () use ($calc) {
        return $calc->calc('*', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7);
    };
    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc(\'*\', $calc::FLOAT, 1, 2, 3, 4, 5, 6, 7)</code>',
        $badMethod
    )->expectException(InvalidArgumentException::class));
});

specify($statement = "Will throw an Exception if the return type is not known", $exec = function () use ($before, $statement) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $badMethod = function () use ($calc) {
        $calc->calc('+', 2, 1, 2, 3, 4, 5, 6, 7);
    };
    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc(\'+\', 2, 1, 2, 3, 4, 5, 6, 7)</code>',
        $badMethod
    )->expectException(InvalidArgumentException::class));

});


specify($statement = "Will throw an Exception if the return type is not known", $exec = function () use ($statement, $before) {
    /**
     * @var $calc OperationContract
     */
    $calc = $before();
    $badMethod = function () use ($calc) {
        $calc->calc('-', 2, 1, 2, 3, 4, 5, 6, 7);
    };
    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>$calc->calc(\'-\', 2, 1, 2, 3, 4, 5, 6, 7)</code>',
        $badMethod
    )->expectException(InvalidArgumentException::class));
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
