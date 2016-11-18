<?php

use Oopphp\{AddCalc, SubtractCalc};

require_once __DIR__ . '/../bootstrap.php';

describe("A class can use delegation to extend other objects", function () {
    /**
     * @return SubtractCalc
     */
    $getSubtractClass = function () {
        return new SubtractCalc(new AddCalc());
    };

    it("Can subtract a list of numbers and return an integer", function () use ($getSubtractClass) {
        /**
         * @var $class SubtractCalc
         */
        $class = $getSubtractClass();
        expect($class->subtractInt(1, 2, 3))->toBe(-6);
        expect($class->subtractInt(2.2, 2, 2))->toBe(-6);
    });

    it("Can subtract a list of numbers and return a float", function () use ($getSubtractClass) {
        /**
         * @var $class SubtractCalc
         */
        $class = $getSubtractClass();
        expect($class->subtractFloat(1, 2.2))->toBe(-3.2);
    });

    it("Can add a list of numbers and return an integer", function () use ($getSubtractClass) {
        /**
         * @var $class SubtractCalc
         */
        $class = $getSubtractClass();
        expect($class->addInt(1, 2, 3, 4))->toBe(10);
    });

    it("Can add a list of numbers and return a float", function () use ($getSubtractClass) {
        /**
         * @var $class SubtractCalc
         */
        $class = $getSubtractClass();
        expect($class->addFloat(1, 2, 3, 4.1))->toBe(10.1);
    });

});
