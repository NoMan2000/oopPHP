<?php

use Oopphp\ToString;

require_once __DIR__ . '/../bootstrap.php';

describe("Can turn an object into a string", function () {

    /**
     * @return ToString
     */
    $getClass = function () {
        return new ToString();
    };

    it("Changes into a string", function () use($getClass) {
        /**
         * @var $class ToString
         */
        $class = $getClass();
        expect(strval($class))->toBe('test string');
    });
});
