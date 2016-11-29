<?php
namespace ChapterSix;

use Codeception\Specify;
use Oopphp\ChapterSix\MagicMethodsClass;
use stdClass;
use InvalidArgumentException;

require_once __DIR__ . '/../../bootstrap.php';
$title = "Tests for " . __FILE__;
require_once __DIR__ . '/../partials/header.php';

/**
 * @return MagicMethodsClass
 * @before
 */
$before = function() {
    $items = new stdClass();
    $items->func = function () {
        return "invoked";
    };
    $items->funcArgs = function ($value) {
        return $value;
    };
    $items->prop = "prop";
    return new MagicMethodsClass($items);
};

specify($statement = "Will call the items passed in the constructor", function () use($statement, $before) {
    /**
     * @var $magicMethodsClass MagicMethodsClass
     */
    $magicMethodsClass = $before();
    verifyExt(
        $statement . '<code>$magicMethodsClass->func()</code>',
        $magicMethodsClass->func()
    )->equals("invoked")->e();

    verifyExt(
        $magicMethodsClass->funcArgs('random arg')
    )->equals('random arg')->e();
});


specify($statement = "Will throw an exception on an invalid argument", function () use($before, $statement) {
    /**
     * @var $magicMethodsClass MagicMethodsClass
     */
    $magicMethodsClass = $before();
    verifyExt(
        $statement . ' <code>$magicMethodsClass->nonExistantFunc()</code> ',
        $magicMethodsClass->nonExistantFunc()
    )->isInstanceOf(InvalidArgumentException::class)->e();
});


    specify($statement = "Can access a property passed in the constructor", function () use ($statement, $before) {
        /**
         * @var $magicMethodsClass MagicMethodsClass
         */
        $magicMethodsClass = $before();
        verifyExt(
            $statement . '<code>$magicMethodsClass->prop</code>',
            $magicMethodsClass->prop
        )->equals('prop')->e();
    });


    specify($statement = "A static call to the function can be made", function () use ($statement, $before) {
        /**
         * @var $magicMethodsClass MagicMethodsClass
         */
        $magicMethodsClass = $before();
        verifyExt(
            $statement . '<code>MagicMethodsClass::someFunc()</code>',
            MagicMethodsClass::someFunc()
        )->equals(MagicMethodsClass::class)->e();
    });


    specify($statement = "A property can be dynamically set and get", function () use ($statement, $before) {
        /**
         * @var $magicMethodsClass MagicMethodsClass
         */
        $magicMethodsClass = $before();
        $magicMethodsClass->dynamic = "dynamic prop";
        verifyExt(
            $statement . '<code></code>',
            $magicMethodsClass->dynamic
        )->equals('dynamic prop')->e();
        verifyExt(isset($magicMethodsClass->dynamic))->equals(true);
        verifyExt(isset($magicMethodsClass->nonexistant))->equals(false);
        unset($magicMethodsClass->dynamic);
        verifyExt(isset($magicMethodsClass->dynamic))->equals(false);
    });


    specify("The __sleep and __wakeup methods will be invoked when serializing and unserializing an object", function () {
        $connectionItemsStart = $this->magicMethodsClass->getConnectionItems();
        verify($connectionItemsStart)->isEmpty();
        $stringValues = serialize($this->magicMethodsClass);
        $arrayValues = (array) unserialize($stringValues); // Note that protected and private properties will have special characters
        $classValues = unserialize($stringValues);
        verify($arrayValues['thing'])->equals(1);
        verify($classValues->thing)->equals(1);
    });



    specify("Will return the classname when cast into a string", function () {
        verify(strval($this->magicMethodsClass))->equals(MagicMethodsClass::class);
    });


    specify("Can invoke an object", function () {
        $function = function () {
            return 'function';
        };
        $class = $this->magicMethodsClass;
        verify($class($function))->equals('function');
    });


    specify("Can get an object with var_export and return set to true", function () {
        $value = var_export($this->magicMethodsClass, true);
        verify($value)->contains('thing');
    });



if (!isset($noInclude)) {
    require_once __DIR__ . '/../partials/footer.php';
}
