<?php

use Oopphp\AddCalc;

require_once __DIR__ . '/../bootstrap.php';

describe("Can implement a Contract", function () {
    $calc = new AddCalc();

    it("Can add a variable range of numbers", function () use ($calc) {
        expect($calc->addInt('25'))->toBe(25);
        expect($calc->addInt(25, 10, 33))->toBe(68);
        expect($calc->addInt(10, -10))->toBe(0);
        expect($calc->addInt(10.5, 1.2))->toBe(11);
        expect($calc->addInt(2.2))->toBeA('integer');
    });
});
