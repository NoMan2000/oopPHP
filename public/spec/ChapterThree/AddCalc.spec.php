<?php

use Oopphp\ChapterThree\AddCalc;

require_once __DIR__ . '/../../bootstrap.php';

describe("Can implement a Contract", function () {

    /**
     * @return AddCalc
     */
    $getClass = function () {
        return new AddCalc();
    };

    it("Can add a variable range of numbers and return an integer", function () use ($getClass) {
        /**
         * @var $calc AddCalc
         */
        $calc = $getClass();
        expect($calc->addInt('25'))->toBe(25);
        expect($calc->addInt(25, 10, 33))->toBe(68);
        expect($calc->addInt(10, -10))->toBe(0);
        expect($calc->addInt(10.5, 1.2))->toBe(11);
        expect($calc->addInt(2.2))->toBeA('integer');
    });

    it("Can add a variable range of numbers and return a float", function () use ($getClass){
        /**
         * @var $calc AddCalc
         */
        $calc = $getClass();
        expect($calc->addFloat(1, 2, 3.4))->toBe(6.4);
        expect($calc->addFloat(2.2))->toBeA('float');
    });
});
