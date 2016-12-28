<?php

namespace ChapterNine;

use Oopphp\ChapterNine\FibonacciGenerator;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return FibonacciGenerator
 */
$before = function() {
    return new FibonacciGenerator();
};

specify($statement = "Can return a generated list", function () use ($before, $statement) {
    /**
     * @var $fibonacciClass FibonacciGenerator
     */
    $fibonacciClass = $before();
    $outerKey = 0;
    $outerValue = 0;
    foreach ($fibonacciClass->getSequence(19) as $key => $value) {
        $outerKey = $key;
        $outerValue = $value;
    }
    verifyExt(
        $statement,
        $outerKey
    )->equals(19)->e();

    verifyExt(
        $statement,
        $outerValue
    )->equals(4181)->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
