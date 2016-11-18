<?php

use Oopphp\DynamicProperty;

require_once __DIR__ . '/../bootstrap.php';

describe("A dynamic property can be set on a class, but this is considered a bad idea", function () {
    /**
     * @return DynamicProperty
     */
    $getClass = function () {
        return new DynamicProperty();
    };

    it("Can get a dynamic property", function () use ($getClass) {
        /**
         * @var $class DynamicProperty
         */
        $class = $getClass();
        expect($class->getDynamicProperty())->toBe("bad");
    });
});
