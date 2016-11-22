<?php

use Oopphp\ChapterThree\CalcIterator;
use Oopphp\Contracts\OperationContract;

require_once __DIR__ . '/../../bootstrap.php';

/**
 * @return CalcIterator
 */
$before = function () {
    $numbers = [1, 2, 3, 4];
    return new CalcIterator($numbers);
};


specify($spec = "Can perform an operation", $exec = function () use ($before, $spec) {
    printAssertion(verifyExt(
        $spec . ' for the evaluated statement: <code>$before()->calcIterator->calc("+", OperationContract::INT)</code>',
        $before()->calc('+', OperationContract::INT)
    )->equals(10));
});

specify($statement = "Can perform a foreach loop with Keys and values", $exec = function () use ($statement, $before) {
    /**
     * @var $calc CalcIterator
     */
    $calc = $before();
    $itemList = $calc->getItemList();
    $count = $calc->count();
    printAssertion(verifyExt(
        $statement . ' for the evaluated statement: <code>count($itemList)</code>',
        count($itemList)
    )->equals($count));

    foreach ($calc as $key => $value) {
        printAssertion(verifyExt(
            $statement . ' for the evaluated statement: <code>$itemList[$key]</code>',
            $value
        )->equals($itemList[$key]));
    }
});
$title = 'Calc Iterator Test';
require_once __DIR__ . '/../partials/header.php';
require_once __DIR__ . '/../partials/footer.php';
