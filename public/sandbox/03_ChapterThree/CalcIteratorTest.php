<?php

use Oopphp\ChapterThree\CalcIterator;
use Oopphp\Contracts\OperationContract;

require_once __DIR__ . '/../../bootstrap.php';
$title = 'Calc Iterator Test';
require_once __DIR__ . '/../partials/header.php';
/**
 * @return CalcIterator
 */
$before = function () {
    $numbers = [1, 2, 3, 4];
    return new CalcIterator($numbers);
};


specify($spec = "Can perform an operation", function () use ($before, $spec) {
    verifyExt(
        $spec . ' <code>$before()->calcIterator->calc("+", OperationContract::INT)</code>',
        $before()->calc('+', OperationContract::INT)
    )->equals(10)->e();
});

specify($statement = "Can perform a foreach loop with Keys and values", function () use ($statement, $before) {
    /**
     * @var $calc CalcIterator
     */
    $calc = $before();
    $itemList = $calc->getItemList();
    $count = $calc->count();
    verifyExt(
        $statement . ' <code>count($itemList)</code>',
        count($itemList)
    )->equals($count)->e();

    foreach ($calc as $key => $value) {
        verifyExt(
            $statement . ' <code>$itemList[$key]</code>',
            $value
        )->equals($itemList[$key])->e();
    }
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
