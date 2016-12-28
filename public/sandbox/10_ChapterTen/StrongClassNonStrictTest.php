<?php
// declare(strict_types=1);
namespace ChapterTen;

use Codeception\Specify;
use TypeError;
use Oopphp\ChaperTen\StrongClass;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';


$before = function() {
    return new StrongClass();
};

specify($statement = "Strong class with return type will not convert the argument to the appropriate type and will throw an error",
    function () use ($statement, $before) {
        /**
         * @var StrongClass $strongClass
         */
        $strongClass = $before();
        verifyExt($statement . '<code>$strongClass->getInt(1)</code>', $strongClass->getInt(1))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getFloat(1.3333)</code>', $strongClass->getFloat(1.3333))->equals(1.3333)->e();
        verifyExt($statement . '<code>$strongClass->getString(\'1\')</code>', $strongClass->getString('1'))->equals('1')->e();
        verifyExt($statement . '<code>$strongClass->getBool(false)</code>', $strongClass->getBool(false))->equals(false)->e();
    }
);


specify($statement = "Using an invalid return type will throw an error", function () use ($statement, $before) {
    /**
     * @var StrongClass $strongClass
     */
    $strongClass = $before();
    try {
        verifyExt($statement . '<code>$strongClass->getInt(\'1\')</code>', $strongClass->getInt('1'))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getInt(\'1\')</code>', $strongClass->getInt('1'))->internalType('integer')->e();
        verifyExt($statement . '<code>$strongClass->getInt(true)</code>', $strongClass->getInt(true))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getInt(false)</code>', $strongClass->getInt(false))->equals(0)->e();
        verifyExt($statement . '<code>$strongClass->getInt(1.3333)</code>', $strongClass->getInt(1.3333))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getFloat(\'1\')</code>', $strongClass->getFloat('1'))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getString(1)</code>', $strongClass->getString(1))->equals('1')->e();
        verifyExt($statement . '<code>$strongClass->getBool(1)</code>', $strongClass->getBool(1))->equals(true)->e();
        verifyExt($statement . '<code>$strongClass->getBool(1)</code>', $strongClass->getBool(1))->internalType('boolean')->e();
    } catch (\Throwable $e) {
        verifyExt($statement . '<code>$e instanceof Throwable</code>', $e instanceof \Throwable)->equals(true)->e();
    }
});

specify($statement = "Strong class with return type will convert the argument to the appropriate type if it is reasonable",
    function () use ($statement, $before) {
        /**
         * @var StrongClass $strongClass
         */
        $strongClass = $before();
        verifyExt($statement . '<code>$strongClass->getTypedInt(\'1\')</code>', $strongClass->getTypedInt('1'))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(\'1\')</code>', $strongClass->getTypedInt('1'))->internalType('integer')->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(1)</code>', $strongClass->getTypedInt(1))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(\'1\')</code>', $strongClass->getTypedInt('1'))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(true)</code>', $strongClass->getTypedInt(true))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(false)</code>', $strongClass->getTypedInt(false))->equals(0)->e();
        verifyExt($statement . '<code>$strongClass->getTypedInt(1.3333)</code>', $strongClass->getTypedInt(1.3333))->equals(1)->e();
        verifyExt($statement . '<code>$strongClass->getTypedFloat(\'1\')</code>', $strongClass->getTypedFloat('1'))->equals(1.0)->e();
        verifyExt($statement . '<code>$strongClass->getTypedFloat(1)</code>', $strongClass->getTypedFloat(1))->equals(1.0)->e();
        verifyExt($statement . '<code>$strongClass->getTypedBool(0)</code>', $strongClass->getTypedBool(0))->equals(false)->e();
        verifyExt($statement . '<code>$strongClass->getTypedBool(1)</code>', $strongClass->getTypedBool(1))->equals(true)->e();
        verifyExt($statement . '<code>$strongClass->getTypedBool(1)</code>', $strongClass->getTypedBool(1))->internalType('boolean')->e();
        verifyExt($statement . '<code>$strongClass->getTypedString(1)</code>', $strongClass->getTypedString(1))->equals('1')->e();
    }
);


specify($statement = "An invalid type will fail", function () use ($statement, $before) {
    /**
     * @var StrongClass $strongClass
     */
    $strongClass = $before();
    try {
        verifyExt($statement, $strongClass->getTypedBool([]))->equals(0);
    } catch (\Throwable $e) {
        verifyExt($statement . '<code>$strongClass->getTypedBool([]); $e instanceof Throwable</code>', $e instanceof \Throwable)->equals(true)->e();
    }
});


specify($statement = "Passing an invalid argument type will not throw an error even if it is unreasonable", function () use ($statement, $before) {
    /**
     * @var StrongClass $strongClass
     */
    $strongClass = $before();
    $class = $strongClass->getClassToString();
    verifyExt($statement, $class)->internalType('object');
    verifyExt($statement, $strongClass->getCoerciveInt([]))->equals(0)->e();
    verifyExt($statement, $strongClass->getCoerciveInt([1]))->equals(1)->e();
    verifyExt($statement, $strongClass->getCoerciveFloat([1]))->equals(1.0)->e();

    verifyExt($statement, $strongClass->getCoerciveBool([]))->equals(false)->e();
    verifyExt($statement, $strongClass->getCoerciveBool([1]))->equals(true)->e();
    // This is probably one of the most unexpected results
    verifyExt($statement, $strongClass->getCoerciveBool($class))->equals(true)->e();
    verifyExt($statement, $strongClass->getCoerciveString($class))->equals('string')->e();

});

specify($statement = "Returning an invalid type will throw an error", function () use ($statement, $before) {
    /**
     * @var StrongClass $strongClass
     */
    $strongClass = $before();
    try {
        verifyExt($statement, $strongClass->getInt([]))->equals(0);
        verifyExt($statement, $strongClass->getInt([1]))->equals(1);

        verifyExt($statement, $strongClass->getFloat([]))->equals(0);
        verifyExt($statement, $strongClass->getFloat([1]))->equals(1);
    } catch (\Throwable $e) {
        verifyExt($statement . '<code>$strongClass->getFloat([]); $e instanceof Throwable</code>', $e instanceof \Throwable)->equals(true)->e();

    }


});


if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
