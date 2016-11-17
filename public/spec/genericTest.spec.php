<?php

require_once __DIR__ . '/../bootstrap.php';

use Oopphp\GenericClass;

describe("This is a basic test", function () {

    $class = new GenericClass();

    it("Should have a default int value of 0", function () use ($class) {
        expect($class->getIntProperty())->toBe(0);
    });

    it("Should return the class back as a fluent method", function () use ($class) {
        expect($class->setIntProperty(10))->toBeAnInstanceOf(GenericClass::class);
    });

    it("Should be able to set and retrieve an integer value", function () use ($class) {
        $class->setIntProperty(14);
        expect($class->getIntProperty())->toBe(14);
    });
});
