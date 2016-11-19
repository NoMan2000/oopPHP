<?php

require_once __DIR__ . '/../../bootstrap.php';

use Oopphp\ChapterOne\BeginnerTest;

describe("This is a basic test", function () {

    $test = new BeginnerTest();

    it("Should evaluate true as true", function () use ($test) {

        expect($test->isTrue())->toBe(true);
    });

    it("Should evaluate false as false", function () use ($test) {
        expect($test->isFalse())->toBe(false);
    });

    it("Should evaluate the passed in boolean as a boolean", function () use ($test) {
        expect($test->isBool(true))->toBe(true);
        expect($test->isBool(false))->toBe(false);
    });
});
