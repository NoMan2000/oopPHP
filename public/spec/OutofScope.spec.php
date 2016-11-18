<?php

use Oopphp\OutOfScope;

require_once __DIR__ . '/../bootstrap.php';

describe("It can create magical getters and setters", function () {
    /**
     * @return OutOfScope
     */
    $getClass = function () {
        return new OutOfScope();
    };
    it("Can get and set a value dynamically", function () use ($getClass) {
        /**
         * @var $class OutOfScope
         */
        $class = $getClass();
        expect($class->foo)->toBe(null);
        $class->foo = "bar";
        expect($class->foo)->toBe("bar");
    });
});
