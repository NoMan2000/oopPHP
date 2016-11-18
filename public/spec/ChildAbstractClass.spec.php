<?php

use Oopphp\ChildAbstractClass;

require_once __DIR__ . '/../bootstrap.php';

describe("Can perform operations in a child class of a parent class", function () {

    /**
     * @return ChildAbstractClass
     */
    $getClass = function () {
        return new ChildAbstractClass();
    };
    /**
     * The final class cannot be extended, but it can be used, so long as it is not declared private.
     */
    it("Can get the parent class's methods", function () use ($getClass) {
        /**
         * @var $class ChildAbstractClass
         */
        $class = $getClass();
        expect($class->getFinalFunction())->toBe("This is the final function");
    });

    it("Can extend a parent's methods", function () use ($getClass) {
        /**
         * @var $class ChildAbstractClass
         */
        $class = $getClass();
        expect($class->getMyVariable())->toBe("old value new value");
    });
});
