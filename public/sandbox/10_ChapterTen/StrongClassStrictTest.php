<?php
declare(strict_types = 1);

namespace ChapterTen;

use Oopphp\ChaperTen\StrongClass;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


/**
 * @return StrongClass
 */
$before = function () {
    return new StrongClass();
};


specify($statement = "Strong class with return type will not convert the argument to the appropriate type and will throw an error", function () use ($statement, $before) {
    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    verifyExt($statement, $strongClass->getInt(1))->equals(1)->e();
    verifyExt($statement, $strongClass->getFloat(1.3333))->equals(1.3333);
    verifyExt($statement, $strongClass->getString('1'))->equals('1')->e();
    verifyExt($statement, $strongClass->getBool(false))->equals(false)->e();
});


specify($statement = "Using an invalid return type will throw an error", function () use ($statement, $before) {
    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    try {
        verifyExt($statement, $strongClass->getInt('1'))->equals(1)->e();
        verifyExt($statement, $strongClass->getInt('1'))->internalType('integer')->e();
        verifyExt($statement, $strongClass->getInt(true))->equals(1)->e();
        verifyExt($statement, $strongClass->getInt(false))->equals(0);
        verifyExt($statement, $strongClass->getInt(1.3333))->equals(1);
        verifyExt($statement, $strongClass->getFloat('1'))->equals(1);
        verifyExt($statement, $strongClass->getString(1))->equals('1');
        verifyExt($statement, $strongClass->getBool(1))->equals(true);
        verifyExt($statement, $strongClass->getBool(1))->internalType('boolean')->e();
    } catch (\Throwable $e) {

    }
});


specify($statement = "Strong class with return type will convert the argument to the appropriate type if it is reasonable", function () use ($statement, $before) {
    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    try {
        verify($statement, $strongClass->getTypedInt('1'))->equals(1);
        verify($statement, $strongClass->getTypedInt('1'))->internalType('integer');


        verify($statement, $strongClass->getTypedInt(1))->equals(1);
        verify($statement, $strongClass->getTypedInt('1'))->equals(1);
        verify($statement, $strongClass->getTypedInt(true))->equals(1);
        verify($statement, $strongClass->getTypedInt(false))->equals(0);
        verify($statement, $strongClass->getTypedInt(1.3333))->equals(1);

        verify($statement, $strongClass->getTypedFloat('1'))->equals(1.0);

        verify($statement, $strongClass->getTypedFloat(1))->equals('1');

        verify($statement, $strongClass->getTypedBool(0))->equals(false);
        verify($statement, $strongClass->getTypedBool(1))->equals(true);

        verify($statement, $strongClass->getTypedBool(1))->internalType('boolean');

        verify($statement, $strongClass->getTypedString(1))->equals('1');
    } catch (\Throwable $e) {

    }
});


specify($statement = "An invalid type will fail", function () use ($statement, $before) {
    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    try {
        verify($statement, $strongClass->getTypedBool([]))->equals(0);
    } catch (\Throwable $e) {

    }
});


specify($statement = "Passing an invalid argument type will not throw an error even if it is unreasonable", function () use ($statement, $before) {

    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    $class = $strongClass->getClassToString();
    verify($statement, $class)->internalType('object');
    verify($statement, $strongClass->getCoerciveInt([]))->equals(0);
    verify($statement, $strongClass->getCoerciveInt([1]))->equals(1);
    verify($statement, $strongClass->getCoerciveFloat([1]))->equals(1);

    verify($statement, $strongClass->getCoerciveBool([]))->equals(false);
    verify($statement, $strongClass->getCoerciveBool([1]))->equals(true);
    // This is probably one of the most unexpected results
    verify($statement, $strongClass->getCoerciveBool($class))->equals(true);
    verify($statement, $strongClass->getCoerciveString($class))->equals('string');

});


specify($statement = "Returning an invalid type will throw an error", function () use ($statement, $before) {
    /**
     * @var $strongClass StrongClass
     */
    $strongClass = $before();
    verify($statement, $strongClass->getInt([]))->equals(0);
    verify($statement, $strongClass->getInt([1]))->equals(1);

    verify($statement, $strongClass->getFloat([]))->equals(0);
    verify($statement, $strongClass->getFloat([1]))->equals(1);


});

if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
