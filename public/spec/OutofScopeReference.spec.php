<?php

use Oopphp\OutOfScopeReference;

require_once __DIR__ . '/../bootstrap.php';

describe("It can create magical getters and setters", function () {
    /**
     * @return OutOfScopeReference
     */
    $getClass = function () {
        return new OutOfScopeReference();
    };
    /**
     * Please never do this, but you can pass by reference with a magic __get method
     */
    it("Can get and set a value dynamically", function () use ($getClass) {
        /**
         * @var $class OutOfScopeReference
         */
        $class = $getClass();

        $class->foo = "Jack";
        $bad =& $class->foo;
        $class->foo = 'Me';
        expect($bad)->toBe("Me");
    });
});
