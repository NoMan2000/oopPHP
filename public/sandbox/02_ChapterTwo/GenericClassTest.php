<?php

require_once __DIR__ . '/../../bootstrap.php';

use Oopphp\ChapterTwo\GenericClass;
$title = "Generic Class Test";
require_once __DIR__ . '/../partials/header.php';
echo "<h2 class='page-header'>Testing GenericClass</h2>";

/**
 * @return GenericClass
 */
$before = function() {
    return new GenericClass();
};

callBackAssertion(
    "Should have a default int value of 0",
    $before()->getIntProperty() === 0,
    '$before()->getIntProperty()');

callBackAssertion(
    "Should return the class back as a fluent method",
    $before()->setIntProperty(10) instanceof GenericClass,
    '$before()->setIntProperty(10) instanceof GenericClass'
);

callBackAssertion(
    "Should be able to set and retrieve an integer value",
    (function (callable $before) {
        /**
         * @var $class GenericClass
         */
        $class = $before();
        $class->setIntProperty(14);
        return $class->getIntProperty();
    })($before) === 14,
    '(function(callable $before) {
        $before()->setIntProperty(14);
        return $before()->getIntProperty();
    })($before) === 14'
);

specify($statement = "Should have a default int value of 0", function () use ($before, $statement) {
    verifyExt(
        $statement . ' <code>$before()->getIntProperty()->equals(0)</code>',
        $before()->getIntProperty()
    )->equals(0)->e();
});

specify($statement = "Should return the class back as a fluent method", $eval = function () use ($before, $statement) {
    verifyExt(
        $statement . ' for the evaluated statement: <code>$before()->setIntProperty(10)->isInstanceOf(GenericClass::class)</code>',
        $before()->setIntProperty(10)
    )->isInstanceOf(GenericClass::class)->e();
});

specify($statement = "Should be able to set and retrieve an integer value", $eval = function () use ($before, $statement) {
    /**
     * @var $class GenericClass
     */
    $class = $before();
    $class->setIntProperty(14);
    verifyExt(
        $statement . ' for the evaluated statement: <code>$class->getIntProperty()->equals(14)</code>',
        $class->getIntProperty()
    )->equals(14)->e();
});
if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
