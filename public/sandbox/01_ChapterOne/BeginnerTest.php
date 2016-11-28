<?php

require_once __DIR__ . '/../../bootstrap.php';
$title = "Beginner Test";
require_once __DIR__ . '/../partials/header.php';

use Oopphp\ChapterOne\Beginner;

/**
 * @return Beginner
 */
$getClass = function () {
    return new Beginner();
};

callBackAssertion(
    "Should evaluate true as true",
    $getClass()->isTrue() === true,
    '$getClass()->isTrue() === true'
);
callBackAssertion(
    "Should evaluate false as false",
    $getClass()->isFalse() === false,
    '$getClass()->isFalse() === false'
);
callBackAssertion(
    "Should evaluate the passed in boolean as a boolean",
    $getClass()->isBool(true) === true,
    '$getClass()->isBool(true) === true'
);
callBackAssertion(
    "Should evaluate the passed in boolean as a boolean",
    $getClass()->isBool(false) === false,
    '$getClass()->isBool(false) === false'
);

specify($statement = "Should evaluate true as true", function () use ($getClass, $statement) {
    verifyExt(
        $statement . ' <code>$getClass()->isTrue())->equals(true)</code>', $getClass()->isTrue()
    )->equals(true)->e();

});

specify($statement = "Should evaluate false as false", function () use ($getClass, $statement) {
    verifyExt(
        $statement . ' <code>$getClass()->isFalse())->equals(false)</code>',
        $getClass()->isFalse()
    )->equals(false)->e();
});

specify($statement = "Should evaluate the passed in boolean as a boolean", function () use ($getClass, $statement) {
    verifyExt(
        $statement . ' <code>$getClass()->isBool(true))->equals(true)</code>',
        $getClass()->isBool(true)
    )->equals(true)->e();
    verifyExt(
        $statement . ' <code>$getClass()->isBool(false))->equals(false)</code>',
        $getClass()->isBool(false)
    )->equals(false)->e();
});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
